<?php

namespace App\Http\Controllers\Auth;
use App\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign parent role to newly registered user
        $parentRole = Role::where('slug', 'parent')->first();
        if ($parentRole) {
            $user->roles()->attach($parentRole->id);
        }

        Auth::attempt($request->only('email', 'password'));
        
        return redirect()->route('parent.space');
    }
}
