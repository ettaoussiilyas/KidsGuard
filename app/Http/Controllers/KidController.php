<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        $childRole = Role::where('slug', 'child')->first();
        
        DB::table('role_user')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'role_id' => $childRole->id,
                'updated_at' => now()
                // 'created_at' => now(),
            ]
        );
        
        // Get the first child profile if none is selected yet
        if (!session('current_kid_id') && $user->childProfiles->count() > 0) {
            $firstProfile = $user->childProfiles->first();
            session(['current_kid_id' => $firstProfile->id]);
            session(['current_kid_name' => $firstProfile->name]);
        }
        
        return view('kid.index');
    }
    
    /**
     * Switch to a different child profile
     */
    public function switchProfile($id)
    {
        $user = Auth::user();
        // Use the correct relationship method name
        $childProfile = $user->childProfiles()->findOrFail($id);
        // Or if the relationship is named differently, use:
        // $childProfile = $user->kidProfiles()->findOrFail($id);
        
        // Store the selected profile in session
        session(['current_kid_id' => $childProfile->id]);
        session(['current_kid_name' => $childProfile->name]);
        
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
