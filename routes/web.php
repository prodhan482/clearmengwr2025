<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

// Admin group (middleware: auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('participants', ParticipantController::class)->except(['index', 'show', 'store']);

    Route::get('/participants/create', [ParticipantController::class, 'create'])->name('admin.participants.create');
    Route::post('/participants', [ParticipantController::class, 'store'])->name('admin.participants.store');
    Route::get('/participants/{id}/edit', [ParticipantController::class, 'edit'])->name('admin.participants.edit');
    Route::put('/participants/{id}', [ParticipantController::class, 'update'])->name('admin.participants.update');
    Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->name('admin.participants.destroy');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('participants', [AuthController::class, 'participantsList'])->name('participants.list');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
