<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Redirect to login if user is not authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get current user ID
        $userId = Auth::id();
        
        // Check if user has any of the required roles
        $hasRole = DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('role_user.user_id', $userId)
            ->whereIn('roles.slug', $roles)
            ->exists();
            
        // Deny access if user doesn't have any required role
        if (!$hasRole) {
            // Check if user is admin
            $isAdmin = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('role_user.user_id', $userId)
                ->where('roles.slug', 'admin')
                ->exists();
                
            if ($isAdmin) {
                // Redirect admin to admin dashboard
                return redirect()->route('admin.dashboard');
            }
            
            // Check if user is a child trying to access parent routes
            $isChild = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('role_user.user_id', $userId)
                ->where('roles.slug', 'child')
                ->exists();
                
            if ($isChild) {
                // Redirect child to kids page
                return redirect()->route('switch-to-kid');
            }

            $isParent = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('role_user.user_id', $userId)
                ->where('roles.slug', 'parent')
                ->exists();
            
            if($isParent) {
                //Redirect The parent to his dashboard
                return redirect()->route('parent.space');
            }
            
            // For other unauthorized access, show 403 error
            abort(403, 'Unauthorized action. Not for This Role');
        }

        return $next($request);
    }
}