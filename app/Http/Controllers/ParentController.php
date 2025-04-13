<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ParentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get child profiles count
        $childrenCount = DB::table('child_profiles')
            ->where('parent_id', $user->id)
            ->whereNull('deleted_at')
            ->count();
        
        // Get content categories count
        $categoriesCount = DB::table('content_categories')
            ->where('is_active', true)
            ->count();
        
        // Get learning values count
        $learningValuesCount = DB::table('learning_values')
            ->where('is_active', true)
            ->count();
        
        // Get special needs categories count
        $specialNeedsCount = DB::table('content_categories')
            ->where('is_active', true)
            ->where('is_special_needs', true)
            ->count();
        
        // Get average age of children
        $averageAge = DB::table('child_profiles')
            ->where('parent_id', $user->id)
            ->whereNull('deleted_at')
            ->avg('age');
        
        return view('parent.index', [
            'childrenCount' => $childrenCount,
            'categoriesCount' => $categoriesCount,
            'learningValuesCount' => $learningValuesCount,
            'specialNeedsCount' => $specialNeedsCount,
            'averageAge' => round($averageAge, 1)
        ]);
    }

    public function switchGuardian(Request $request)
    {
        $request->validate([
            'parent_password' => 'required|string',
        ]);
        
        // dd($request->parent_password);

        $user = Auth::user();
    
        if(Hash::check($request->parent_password, $user->password))
        {
            $parentRole = Role::where('slug', 'parent')->first();
            
            // DB::table('role_user')->where('user_id', $user->id)->delete(); 
            DB::table('role_user')->updateOrInsert(
                ['user_id' => $user->id],
                [
                    'role_id' => $parentRole->id,
                    'updated_at' => now()
                    // 'created_at' => now(),
                ]
            );
            
            return redirect()->route('parent.space');
        } else {
            return back()->with('error', 'Incorrect password. Access denied.')
                         ->with('flash_duration', 2000);
        }
    }

    /**
     * Show the settings page
     */
    public function settings()
    {
        return view('parent.settings');
    }

    /**
     * Update the user's profile information
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->only(['name', 'email', 'bio']);
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                if (Storage::exists('public/avatars/' . $user->avatar)) {
                    Storage::delete('public/avatars/' . $user->avatar);
                }
            }
            
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->file('avatar')->storePubliclyAs('avatars', $avatarName, 'public');
            $data['avatar'] = $avatarName;
        }
        
        $user->update($data);
        
        return redirect()->route('parent.settings')
            ->with('success', 'Profile updated successfully')
            ->with('message_type', 'success');
    }

    /**
     * Update the user's password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string', 'confirmed', Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()],
        ]);
        
        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'The provided password does not match your current password.',
            ]);
        }
        
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        
        return redirect()->route('parent.settings')
            ->with('success', 'Password updated successfully')
            ->with('message_type', 'success');
    }

    /**
     * Delete the user's account
     */
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'delete_password' => 'required|string',
        ]);
        
        $user = Auth::user();
        
        if (!Hash::check($request->delete_password, $user->password)) {
            return back()->withErrors([
                'delete_password' => 'The provided password is incorrect.',
            ]);
        }
        
        // Delete avatar if exists
        if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
        
        // Soft delete the user
        $user->delete();
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')
            ->with('success', 'Your account has been deleted successfully')
            ->with('message_type', 'success');
    }
}