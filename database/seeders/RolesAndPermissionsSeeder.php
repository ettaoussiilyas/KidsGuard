<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Administrator', 'slug' => 'admin']);
        $parentRole = Role::create(['name' => 'Parent', 'slug' => 'parent']);
        $childRole = Role::create(['name' => 'Child', 'slug' => 'child']);

        // Create permissions
        $manageUsers = Permission::create(['name' => 'Manage Users', 'slug' => 'manage-users']);
        $managePreferences = Permission::create(['name' => 'Manage Preferences', 'slug' => 'manage-preferences']);
        $manageProfiles = Permission::create(['name' => 'Manage Profiles', 'slug' => 'manage-profiles']);
        $manageProfile = Permission::create(['name' => 'Manage Profile', 'slug' => 'manage-profile']);
        $viewDashboard = Permission::create(['name' => 'View Dashboard', 'slug' => 'view-dashboard']);
        $manageChildren = Permission::create(['name' => 'Manage Children', 'slug' => 'manage-children']);
        $accessContent = Permission::create(['name' => 'Access Content', 'slug' => 'access-content']);
        $viewDashboardAdmin = Permission::create(['name' => 'Access AdminDashboard', 'slug' => 'access-admin-dashboard']);
        $switchToParentMode = Permission::create(['name' => 'Access switchToParentMode', 'slug' => 'access-switchToParentMode']);
        $manageSettings = Permission::create(['name' => 'Manage Settings', 'slug' => 'manage-settings']);
        $viewReports = Permission::create(['name' => 'View Reports', 'slug' => 'view-reports']);

        // Assign permissions to roles
        $adminRole->permissions()->attach([
            $manageUsers->id, 
            $viewDashboard->id, 
            $viewDashboardAdmin->id, 
            $manageChildren->id, 
            $accessContent->id,
            $managePreferences->id,
            $manageProfiles->id,
            $manageProfile->id,
            $manageSettings->id,
            $viewReports->id
        ]);
        
        $parentRole->permissions()->attach([
            $viewDashboard->id, 
            $manageChildren->id, 
            $accessContent->id,
            $manageProfile->id,
            $manageProfiles->id,
            $managePreferences->id,
            $viewReports->id
        ]);
        
        $childRole->permissions()->attach([
            $accessContent->id,
            $switchToParentMode->id,
            $manageProfile->id
        ]);

        // Create default admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@kidsguard.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $parent = User::create([
            'name' => 'Parent',
            'email' => 'parent@parent.com',
            'password' => Hash::make('parent@parent.com'),
            'email_verified_at' => now(),
        ]);





        // Assign admin role to the admin user
        $admin->roles()->attach($adminRole->id);
        $parent->roles()->attach($parentRole->id);
    }
}
