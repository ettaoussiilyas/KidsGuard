<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        try {
            // Log the attempt to redirect
            Log::info('Attempting to redirect to ' . $provider);
            
            // Debug the configuration
            Log::info('OAuth config', [
                'client_id' => config('services.' . $provider . '.client_id'),
                'redirect' => config('services.' . $provider . '.redirect')
            ]);
            
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            Log::error('Social login redirect error: ' . $e->getMessage());
            return redirect()->route('login.show')
                ->with('error', 'Unable to connect to ' . ucfirst($provider) . '. Error: ' . $e->getMessage());
        }
    }

    /**
     * Handle provider callback.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            // Log successful OAuth response
            Log::info('Social login successful', [
                'provider' => $provider,
                'email' => $socialUser->getEmail(),
                'id' => $socialUser->getId()
            ]);
            
            // Check if user exists with this email
            $user = User::where('email', $socialUser->getEmail())->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make(Str::random(16)),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]);
                
                // Assign parent role to newly registered user
                $parentRole = Role::where('slug', 'parent')->first();
                if ($parentRole) {
                    $user->roles()->attach($parentRole->id);
                }
                
                Log::info('New user created from social login', ['user_id' => $user->id]);
            }
            
            // Login the user
            Auth::login($user);
            
            // Check if user has admin role
            $isAdmin = $user->roles()->where('slug', 'admin')->exists();
            
            if ($isAdmin) {
                return redirect()->route('admin.dashboard');
            }
            
            // Default redirect for non-admin users
            return redirect()->route('parent.space');
            
        } catch (Exception $e) {
            Log::error('Social login callback error: ' . $e->getMessage());
            return redirect()->route('login.show')
                ->with('error', 'Authentication failed: ' . $e->getMessage());
        }
    }
}