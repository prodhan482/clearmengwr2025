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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

/*
 * |--------------------------------------------------------------------------
 * | Authentication Routes
 * |--------------------------------------------------------------------------
 */
Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm']) ->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login']) ->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register.create');

/*
 * |--------------------------------------------------------------------------
 * | Public / Frontend Routes
 * |--------------------------------------------------------------------------
 */
Route::get('/', [ImageController::class, 'getHeroImages'])->name('home') ->middleware('guest');
Route::get('/images/{type}', [ImageController::class, 'getHeroImages']) ->middleware('guest');

/*
 * |--------------------------------------------------------------------------
 * | Routes for Authenticated Users
 * |--------------------------------------------------------------------------
 */

/*
 * |--------------------------------------------------------------------------
 * | Routes for SUPER_ADMIN Only
 * |--------------------------------------------------------------------------
 */
Route::middleware(['auth', RoleMiddleware::class . ':SUPER_ADMIN'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manage Roles & Users
    Route::resource('manage_roles', ManageRolesController::class);
    Route::resource('manage_users', ManageUsersController::class);

    Route::get('/edit-user-profile', [EditProfileController::class, 'index'])->name('edit_user_profile');
    Route::post('/update-user-password', [EditProfileController::class, 'update_user_password'])->name('update_user_password');
    Route::post('/update-user-other-info', [EditProfileController::class, 'update_user_other_info'])->name('update_user_other_info');

    // Image CRUD
    Route::resource('images', ImageController::class)
        ->names('admin.images')
        ->parameters(['images' => 'image']);

    // Participants CRUD
    Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');
    Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
    Route::get('/participants/singlycreate', [ParticipantController::class, 'singlycreate'])->name('participants.singlycreate');
    Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
    Route::get('/participants/{participant}', [ParticipantController::class, 'show'])->name('participants.show');
    Route::get('/participants/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
    Route::put('/participants/{participant}', [ParticipantController::class, 'update'])->name('participants.update');
    Route::delete('/participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
   Route::get('/participants/json/admin', [ParticipantController::class, 'jsonAdmin'])->name('participants.json.admin');

    Route::get('/participants/import', [ParticipantController::class, 'importForm'])->name('participants.importForm');
    Route::post('/participants/import', [ParticipantController::class, 'import'])->name('participants.import');
    Route::get('/user-dashboard', [ParticipantController::class, 'participantsDashboard'])->name('user-dashboard');
    Route::get('/participants-json', [ParticipantController::class, 'participantsJson'])->name('participants.json');
});

/*
 * |--------------------------------------------------------------------------
 * | Routes for USER Only
 * |--------------------------------------------------------------------------
 */
Route::middleware(['auth', RoleMiddleware::class . ':USER'])->group(function () {
    Route::get('/user-dashboard', [ParticipantController::class, 'participantsDashboard'])->name('user-dashboard');
    Route::get('/participants-json', [ParticipantController::class, 'participantsJson'])->name('participants.json');
});
