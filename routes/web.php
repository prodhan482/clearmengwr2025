<?php

use App\Http\Controllers\Admin\ManageRolesController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommonControllers\DashboardController;
use App\Http\Controllers\CommonControllers\EditProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('common_views.dashboard');
//     })->name('admin.dashboard');

//     Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//     Route::resource('participants', ParticipantController::class)->except(['index', 'show', 'store']);

//     // Participants CRUD
//     Route::resource('participants', ParticipantController::class);

//     // Additional route for CSV/Excel import form
//     Route::get('participants/import', [ParticipantController::class, 'importForm'])->name('participants.importForm');

//     // Route to handle import POST request
//     Route::post('participants/import', [ParticipantController::class, 'import'])->name('participants.import');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile
    Route::get('/edit-user-profile', [EditProfileController::class, 'index'])->name('edit_user_profile');
    Route::post('/update-user-password', [EditProfileController::class, 'update_user_password'])->name('update_user_password');
    Route::post('/update-user-other-info', [EditProfileController::class, 'update_user_other_info'])->name('update_user_other_info');

    // Roles & Users
    Route::resource('manage_roles', ManageRolesController::class);
    Route::resource('manage_users', ManageUsersController::class);

    // Image CRUD (all 6 routes)
    Route::prefix('admin')->group(function () {
        Route::resource('images', ImageController::class)
            ->names('admin.images')
            ->parameters(['images' => 'image']);
    });

    // Participants CRUD
    // Participants CRUD (explicit routes)
    Route::get('participants', [ParticipantController::class, 'index'])->name('participants.index');
    Route::get('participants/create', [ParticipantController::class, 'create'])->name('participants.create');
    Route::get('participants/singlycreate', [ParticipantController::class, 'singlycreate'])->name('participants.singlycreate');
    Route::post('participants', [ParticipantController::class, 'store'])->name('participants.store');
    Route::get('participants/{participant}', [ParticipantController::class, 'show'])->name('participants.show');
    Route::get('participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
    Route::put('participants/{participant}', [ParticipantController::class, 'update'])->name('participants.update');
    Route::delete('participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');

    // Additional route for CSV/Excel import form
    Route::get('participants/import', [ParticipantController::class, 'importForm'])->name('participants.importForm');

    // Route to handle import POST request
    Route::post('participants/import', [ParticipantController::class, 'import'])->name('participants.import');
});

// Frontend fetch by type
Route::get('/images/{type}', [ImageController::class, 'getHeroImages']);
Route::GET('/', [ImageController::class, 'getHeroImages'])->name('home');

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/register', [RegisterController::class, 'register'])->name('register.create');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/user-dashboard', [ParticipantController::class, 'userDashboard'])->name('user-dashboard');
    // Route::get('/user-dashboard', [ParticipantController::class, 'participantsList'])->name('user-dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('admin/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });
