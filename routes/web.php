<?php

use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PublicController::class, 'home'])->name('home');
Route::post('/register', [ParticipantController::class, 'store'])->name('register.store');
Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');
Route::get('/participants/{participant}', [ParticipantController::class, 'show'])->name('participants.show');

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

// Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
// Route::get('/', function(){ return view('admin.dashboard'); })->name('admin.dashboard');
// Route::resource('participants', ParticipantController::class)->except(['show','store']);
// });
