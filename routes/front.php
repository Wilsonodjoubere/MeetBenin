<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\ProfileController;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes authentifiées pour les utilisateurs front-end
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/presentation', [ConsumerController::class, 'presentation'])->name('consumer.presentation');
    Route::get('/mon-profil', [ConsumerController::class, 'profile'])->name('consumer.profile');
    Route::put('/mon-profil', [ConsumerController::class, 'updateProfile'])->name('consumer.profile.update');

    // Profile routes pour les utilisateurs front-end
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});