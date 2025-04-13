<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChildProfile;
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
    public function parents()
    {
        $parents = User::where('is_admin', false)->paginate(10);
        return view('admin.users.parents', compact('parents'));
    }

    /**
     * Display the child profiles.
     *
     * @return \Illuminate\View\View
     */
    public function childProfiles()
    {
        $childProfiles = ChildProfile::with('user')->paginate(10);
        return view('admin.child-profiles.index', compact('childProfiles'));
    }

    /**
     * Display the categories.
     *
     * @return \Illuminate\View\View
     */
    public function categories()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display the analytics page.
     *
     * @return \Illuminate\View\View
     */
    public function analytics()
    {
        // Analytics data would be gathered here
        return view('admin.analytics.index');
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
}