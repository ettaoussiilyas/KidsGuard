<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            // dd('true');
            return redirect()->route('parent.space');
        }else {

            return back()->with('error', 'Incorrect password. Access denied.');
        }
    }
}