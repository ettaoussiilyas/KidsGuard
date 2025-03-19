<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
    public function index()
    {
        return view('parent.index');
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
}