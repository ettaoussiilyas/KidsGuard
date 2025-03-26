<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\KidController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildProfileController;
use App\Http\Controllers\Parent\ChildPreferenceController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Guest routes (only accessible when not logged in)
Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Authenticated routes (accessible to any logged in user)
Route::middleware('auth')->group(function () {
    // Logout Route
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Admin user management
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');
    
    // Admin settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});

// Parent routes
Route::middleware(['auth', 'role:parent'])->group(function () {
    // Parent dashboard
    Route::get('/guardian', [ParentController::class, 'index'])->name('parent.space');
    //Switch to kid
    Route::post('/kids', [KidController::class, 'index'])->name('switch-to-kid'); //from dash prent header to kids
    // Parent settings
    Route::get('/settings', function () {
        return view('parent.settings');
    })->name('settings');
    
    // Reports
    Route::get('/reports', function () {
        return view('parent.reports');
    })->name('reports');

    // Profiles
    Route::resource('child-profiles', ChildProfileController::class)->names([
        'index' => 'parent.child-profiles.index',
        'create' => 'parent.child-profiles.create',
        'store' => 'parent.child-profiles.store',
        'edit' => 'parent.child-profiles.edit',
        'update' => 'parent.child-profiles.update',
        'destroy' => 'parent.child-profiles.destroy',
    ]);

    // Pereferences of Kids Profiles
    Route::get('/parent/preferences', [ChildPreferenceController::class, 'index'])
    ->name('parent.preferences.index');
    Route::get('/parent/preferences/{kid}', [ChildPreferenceController::class, 'show'])
    ->name('parent.preferences.show');
    Route::post('/parent/preferences/{kid}', [ChildPreferenceController::class, 'update'])
    ->name('parent.preferences.update');

});

// Child routes
Route::middleware(['auth', 'role:child'])->group(function () {


    Route::post('/gurdian', [ParentController::class, 'switchGuardian'])->name('switch-to-guardian');
    Route::get('/kids', [KidController::class, 'index'])->name('switch-to-kid');
    
    // Content access
    Route::get('/content', function () {
        return view('child.content');
    })->name('content');
    
});



