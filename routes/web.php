<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\KidController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    // Logout Route
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    // Dashboard Route
    Route::get('/guardian', [ParentController::class, 'index'])->name('parent.space')->middleware('auth');
    //Switch to Kid Mode
    Route::post('/hero', [KidController::class, 'index'])->name('kids.space');
});

// Admin routes
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

// Parent routes
Route::middleware('role:parent')->group(function () {
    Route::get('/parent/dashboard', function () {
        return view('parent.dashboard');
    });
});

// Child routes
Route::middleware('role:child')->group(function () {
    Route::get('/child/dashboard', function () {
        return view('child.dashboard');
    });
});

