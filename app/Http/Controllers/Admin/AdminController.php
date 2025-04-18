<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChildProfile;
use App\Models\ChildProfilePreference;
use App\Models\ContentCategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Get counts for dashboard stats
        $usersCount = User::count();
        $parentsCount = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.slug', 'parent')
            ->count();
        
        $childProfilesCount = ChildProfile::count();
        $categoriesCount = ContentCategory::count();
        
        // Calculate storage usage (example)
        $storageUsage = 35; // This would be calculated based on actual storage usage
        
        // Get user activity data for the chart
        $activityDates = [];
        $activityCounts = [];
        
        // Get dates for the last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $activityDates[] = Carbon::now()->subDays($i)->format('M d');
            
            // Count logins for each day (example)
            // In a real app, you would query your activity or login logs
            $count = rand(5, 30); // Placeholder for demo
            $activityCounts[] = $count;
        }
        
        // Get recent activities
        // In a real app, you would have an activities or audit log table
        $recentActivities = collect([
            (object)[
                'type' => 'user_registration',
                'description' => 'New user registered: John Doe',
                'created_at' => Carbon::now()->subHours(2),
            ],
            (object)[
                'type' => 'content_added',
                'description' => 'New category added: Science Experiments',
                'created_at' => Carbon::now()->subHours(5),
            ],
            (object)[
                'type' => 'profile_updated',
                'description' => 'Child profile updated: Emma Smith',
                'created_at' => Carbon::now()->subHours(8),
            ],
            (object)[
                'type' => 'user_registration',
                'description' => 'New user registered: Sarah Johnson',
                'created_at' => Carbon::now()->subHours(12),
            ],
            (object)[
                'type' => 'content_added',
                'description' => 'New learning value added: Teamwork',
                'created_at' => Carbon::now()->subHours(24),
            ],
        ]);
        
        return view('admin.dashboard.index', compact(
            'usersCount',
            'parentsCount',
            'childProfilesCount',
            'categoriesCount',
            'storageUsage',
            'activityDates',
            'activityCounts',
            'recentActivities'
        ));
    }

    /**
     * Display the users management page.
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the parent users.
     *
     * @return \Illuminate\View\View
     */
    // public function parents()
    // {
    //     $parents = User::where('is_admin', false)->paginate(10);
    //     return view('admin.users.parents', compact('parents'));
    // }

    /**
     * Display the child profiles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function childProfiles(Request $request)
    {
        $query = ChildProfile::with('parent');

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('interests', 'like', "%{$search}%")
                  ->orWhere('hobbies', 'like', "%{$search}%")
                  ->orWhere('skills', 'like', "%{$search}%");
            });
        }

        // Apply age filter
        if ($request->has('age') && !empty($request->age)) {
            switch ($request->age) {
                case '0-5':
                    $query->whereBetween('age', [0, 5]);
                    break;
                case '6-9':
                    $query->whereBetween('age', [6, 9]);
                    break;
                case '10-12':
                    $query->whereBetween('age', [10, 12]);
                    break;
                case '13+':
                    $query->where('age', '>=', 13);
                    break;
            }
        }

        // Apply special needs filter
        if ($request->has('special_needs') && !empty($request->special_needs)) {
            switch ($request->special_needs) {
                case 'adhd':
                    $query->where('has_adhd', true);
                    break;
                case 'autism':
                    $query->where('has_autism', true);
                    break;
                case 'other':
                    $query->whereNotNull('special_needs')->where('special_needs', '!=', '');
                    break;
                case 'none':
                    $query->where('has_adhd', false)
                          ->where('has_autism', false)
                          ->where(function($q) {
                              $q->whereNull('special_needs')->orWhere('special_needs', '');
                          });
                    break;
            }
        }

        $childProfiles = $query->paginate(10)->withQueryString();
        
        return view('admin.child-profiles.index', compact('childProfiles'));
    }

    /**
     * Display the specified child profile.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showChildProfile($id)
    {
        $childProfile = ChildProfile::with('parent', 'preferences.learningValue')->findOrFail($id);
        return view('admin.child-profiles.show', compact('childProfile'));
    }

    /**
     * Show the form for editing the specified child profile.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function editChildProfile($id)
    {
        $childProfile = ChildProfile::findOrFail($id);
        $parents = User::whereHas('roles', function($query) {
            $query->where('slug', 'parent');
        })->get();
        
        return view('admin.child-profiles.edit', compact('childProfile', 'parents'));
    }

    /**
     * Update the specified child profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateChildProfile(Request $request, $id)
    {
        $childProfile = ChildProfile::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:18',
            'gender' => 'required|in:boy,girl',
            'parent_id' => 'required|exists:users,id',
            'has_adhd' => 'boolean',
            'has_autism' => 'boolean',
            'special_needs' => 'nullable|string',
            'interests' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);
        
        // Set checkbox values to false if not present in the request
        $validated['has_adhd'] = $request->has('has_adhd') ? true : false;
        $validated['has_autism'] = $request->has('has_autism') ? true : false;
        
        $childProfile->update($validated);
        
        return redirect()->route('admin.child-profiles.index')
            ->with('success', 'Child profile updated successfully.');
    }

    /**
     * Remove the specified child profile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyChildProfile($id)
    {
        $childProfile = ChildProfile::findOrFail($id);
        $childProfile->delete();
        
        return redirect()->route('admin.child-profiles.index')
            ->with('success', 'Child profile deleted successfully.');
    }

    /**
     * Display the categories.
     *
     * @return \Illuminate\View\View
     */
    public function categories()
    {
        $categories = ContentCategory::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display the analytics page.
     *
     * @return \Illuminate\View\View
     */
    /**
     * Display the analytics dashboard.
     */
    public function analytics()
    {
        // Get total users count
        $totalUsers = User::count();
        
        // Get users with parent role
        $totalParents = \App\Models\User::whereHas('roles', function($query) {
            $query->where('slug', 'parent');
        })->count();
        
        // Get total child profiles
        $totalChildProfiles = ChildProfile::count();
        
        // Get profiles with special needs
        $specialNeedsProfiles = ChildProfile::where('has_adhd', true)
            ->orWhere('has_autism', true)
            ->count();
        
        // Get gender distribution
        $genderDistribution = [
            'boy' => ChildProfile::where('gender', 'boy')->count(),
            'girl' => ChildProfile::where('gender', 'girl')->count(),
        ];
        
        // Get age distribution
        $ageDistribution = ChildProfile::selectRaw('age, COUNT(*) as count')
            ->groupBy('age')
            ->orderBy('age')
            ->get()
            ->pluck('count', 'age')
            ->toArray();
        
        // Get most popular learning values
        $popularValues = ChildProfilePreference::selectRaw('learning_value_id, COUNT(*) as count')
            ->with('learningValue')
            ->groupBy('learning_value_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
        
        return view('admin.analytics', compact(
            'totalUsers',
            'totalParents',
            'totalChildProfiles',
            'specialNeedsProfiles',
            'genderDistribution',
            'ageDistribution',
            'popularValues'
        ));
    }

    /**
     * Display the system status page.
     *
     * @return \Illuminate\View\View
     */
    public function systemStatus()
    {
        // System status data would be gathered here
        return view('admin.system.status');
    }

    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        return view('admin.settings.index');
    }

    /**
     * Display the activity log.
     *
     * @return \Illuminate\View\View
     */
    public function activityLog()
    {
        // Activity log data would be gathered here
        return view('admin.activity-log.index');
    }

    /**
     * Show the form for creating a new child profile.
     *
     * @return \Illuminate\View\View
     */
    public function createChildProfile()
    {
        $parents = User::whereHas('roles', function($query) {
            $query->where('slug', 'parent');
        })->get();
        
        return view('admin.child-profiles.create', compact('parents'));
    }

    /**
     * Store a newly created child profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeChildProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:18',
            'gender' => 'required|in:boy,girl',
            'parent_id' => 'required|exists:users,id',
            'has_adhd' => 'boolean',
            'has_autism' => 'boolean',
            'special_needs' => 'nullable|string',
            'interests' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);
        
        // Set checkbox values to false if not present in the request
        $validated['has_adhd'] = $request->has('has_adhd') ? true : false;
        $validated['has_autism'] = $request->has('has_autism') ? true : false;
        
        $childProfile = ChildProfile::create($validated);
        
        return redirect()->route('admin.child-profiles.show', $childProfile->id)
            ->with('success', 'Child profile created successfully.');
    }
}