<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\KidController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildProfileController;
use App\Http\Controllers\Kid\VideoController;
use App\Http\Controllers\Parent\ChildPreferenceController;
use App\Http\Controllers\Youtube\YouTubeController;
use Google\Service\YouTube;

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
    })->name('parent.reports');

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


    // Parent Games
    Route::get('/parent/games', [YouTubeController::class, 'showParentGames'])->name('parent.parent-games');

    // Parent Settings
    Route::get('/parent/settings', [App\Http\Controllers\ParentController::class, 'settings'])->name('parent.settings');
    Route::put('/parent/profile/update', [App\Http\Controllers\ParentController::class, 'updateProfile'])->name('parent.profile.update');
    Route::put('/parent/password/update', [App\Http\Controllers\ParentController::class, 'updatePassword'])->name('parent.password.update');
    Route::delete('/parent/profile/destroy', [App\Http\Controllers\ParentController::class, 'deleteAccount'])->name('parent.profile.destroy');

});

// Child routes
Route::middleware(['auth', 'role:child'])->group(function () {


    Route::post('/gurdian', [ParentController::class, 'switchGuardian'])->name('switch-to-guardian');
    Route::get('/kids', [KidController::class, 'index'])->name('switch-to-kid');
    Route::get('/kids', [KidController::class, 'index'])->name('kid.index');
    // Content access
    Route::get('/content', function () {
        return view('child.content');
    })->name('content');

     //Kid Profile Switching
     Route::get('/kid/switch-profile/{id}', [KidController::class, 'switchProfile'])->name('kid.switch-profile');

     //Kid Content Routes
     //Vidos
     Route::get('/kid/videos', [VideoController::class, 'index'])->name('kid.videos.index');
     Route::get('/kid/videos/{id}', [VideoController::class, 'show'])->name('kid.videos.show');

     //Games
     Route::get('/kid/games', [App\Http\Controllers\Kid\GameController::class, 'index'])->name('kid.games.index');
     Route::get('/kid/games/{id}', [App\Http\Controllers\Kid\GameController::class, 'show'])->name('kid.games.show');

     //Musics
     Route::get('/kid/musics', [App\Http\Controllers\Kid\MusicController::class, 'index'])->name('kid.musics.index');
     Route::get('/kid/musics/{id}', [App\Http\Controllers\Kid\MusicController::class, 'show'])->name('kid.musics.show');

     //Learning
     Route::get('/kid/learning', [App\Http\Controllers\Kid\LearningController::class, 'index'])->name('kid.learning.index');
     Route::get('/kid/learning/{id}', [App\Http\Controllers\Kid\LearningController::class, 'show'])->name('kid.learning.show');

     //Stories
     Route::get('/kid/stories', [App\Http\Controllers\Kid\StoriesController::class, 'index'])->name('kid.stories.index');
     Route::get('/kid/stories/{id}', [App\Http\Controllers\Kid\StoriesController::class, 'show'])->name('kid.stories.show');


    //  Route::get('/kid/videos', [VideosController::class,'showVideos'])->name('kid.videos');
    //  Route::get('/kid/games', [YouTubeController::class,'showGames'])->name('kid.games');
    //  Route::get('/kid/books', [YouTubeController::class,'showBooks'])->name('kid.books');
    
});




