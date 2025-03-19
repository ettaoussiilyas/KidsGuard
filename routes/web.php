<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\KidController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/guardian', [ParentController::class, 'index'])->name('parent.space');
    
    Route::post('/kids', [KidController::class, 'index'])->name('switch-to-kid'); //from dash prent header to kids
    Route::get('/kids', [KidController::class, 'index'])->name('switch-to-kid'); // for redirect
    
    // Parent settings
    Route::get('/settings', function () {
        return view('parent.settings');
    })->name('settings');
    
    // Reports
    Route::get('/reports', function () {
        return view('parent.reports');
    })->name('reports');
});

// Child routes
// Route::middleware(['auth', 'role:child'])->group(function () {
Route::middleware(['auth'])->group(function () {


    Route::post('/gurdian', [ParentController::class, 'switchGuardian'])->name('switch-to-guardian');
    
    // Route::post('/space', [KidController::class, 'index'])->name('space');
    
    // Content access
    Route::get('/content', function () {
        return view('child.content');
    })->name('content');
    
});

