<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ParlerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ajoutez toutes vos routes de ressources
    Route::resource('utilisateurs', UtilisateurController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('type-contenus', TypeContenuController::class);
    Route::resource('types_media', TypeMediaController::class);
    Route::resource('media', MediaController::class);
    Route::resource('commentaires', CommentaireController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('parler', ParlerController::class);
});

require __DIR__.'/auth.php';