<?php

namespace App\Http\Controllers;

use App\Models\ChildProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChildProfileController extends Controller
{
    use AuthorizesRequests;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childProfiles = Auth::user()->childProfiles;
        return view('parent.child_profiles.index', compact('childProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parent.child_profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:boy,girl',
            'age' => 'nullable|integer|min:1|max:16',
            'avatar' => 'nullable|image|max:1024',
            'has_adhd' => 'nullable|boolean',
            'has_autism' => 'nullable|boolean',
            'special_needs' => 'nullable|string',
            'interests' => 'nullable|string',
        ]);

        // Set checkbox values explicitly based on presence in request
        $validated['has_adhd'] = $request->has('has_adhd') ? true : false;
        $validated['has_autism'] = $request->has('has_autism') ? true : false;

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }else {
            $defaultAvatar = $validated['gender'] == 'girl' ? 'avatars/girl-default.png' : 'avatars/boy-default.png';
            $validated['avatar'] = $defaultAvatar;
        }

        $validated['parent_id'] = Auth::id();
        
        ChildProfile::create($validated);

        return redirect()->route('parent.child-profiles.index')
            ->with('success', 'Child profile created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChildProfile $childProfile)
    {
        $this->authorize('update', $childProfile);
        
        return view('parent.child_profiles.edit', compact('childProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChildProfile $childProfile)
    {
        $this->authorize('update', $childProfile);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:boy,girl', 
            'age' => 'nullable|integer|min:1|max:16',
            'avatar' => 'nullable|image|max:1024',
            'has_adhd' => 'nullable|boolean',
            'has_autism' => 'nullable|boolean',
            'special_needs' => 'nullable|string',
            'interests' => 'nullable|string',
        ]);

        // Set checkbox values explicitly based on presence in request
        $validated['has_adhd'] = $request->has('has_adhd') ? true : false;
        $validated['has_autism'] = $request->has('has_autism') ? true : false;

        if ($request->hasFile('avatar')) {
            if ($childProfile->avatar) {
                Storage::disk('public')->delete($childProfile->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $childProfile->update($validated);

        return redirect()->route('parent.child-profiles.index')
            ->with('success', 'Child profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChildProfile $childProfile)
    {
        $this->authorize('delete', $childProfile);
        
        if ($childProfile->avatar) {
            // Check if the avatar is not a default avatar before deleting
            $defaultAvatars = ['avatars/girl-default.png', 'avatars/boy-default.png'];
            if (!in_array($childProfile->avatar, $defaultAvatars)) {
                Storage::disk('public')->delete($childProfile->avatar);
            }
        }
        
        $childProfile->delete();

        return redirect()->route('parent.child-profiles.index')
            ->with('success', 'Child profile deleted successfully.');
    }
}
