<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Administrator', 'slug' => 'admin']);
        $parentRole = Role::create(['name' => 'Parent', 'slug' => 'parent']);
        // $childRole = Role::create(['name' => 'Child', 'slug' => 'child']);

        // Create permissions
        $manageUsers = Permission::create(['name' => 'Manage Users', 'slug' => 'manage-users']);
        $managePrefernces = Permission::create(['name' => 'Manage Prefernces', 'slug' => 'manage-prefernces']);
        $manageProfiles = Permission::create(['name' => 'Manage Profiles', 'slug' => 'manage-profiles']);
        $manageProfile = Permission::create(['name' => 'Manage Profile', 'slug' => 'manage-profile']);
        $viewDashboard = Permission::create(['name' => 'View Dashboard', 'slug' => 'view-dashboard']);
        $manageChildren = Permission::create(['name' => 'Manage Children', 'slug' => 'manage-children']);
        $accessContent = Permission::create(['name' => 'Access Content', 'slug' => 'access-content']);

        // Assign permissions to roles
        $adminRole->permissions()->attach([
            $manageUsers->id, 
            $viewDashboard->id, 
            $manageChildren->id, 
            $accessContent->id
        ]);
        
        $parentRole->permissions()->attach([
            $viewDashboard->id, 
            $manageChildren->id, 
            $accessContent->id,
            $manageProfile->id,
            $manageProfiles->id
        ]);
        
        // $childRole->permissions()->attach([
        //     $accessContent->id
        // ]);
    }
}
