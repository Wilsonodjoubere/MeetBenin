<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\Admin\LangueController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\ContenuController;
use App\Http\Controllers\Admin\TypeContenuController;
use App\Http\Controllers\Admin\TypeMediaController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\CommentaireController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ParlerController;

// Dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Routes CRUD pour l'administration
Route::resource('utilisateurs', UtilisateurController::class)->names('admin.utilisateurs');
Route::resource('langues', LangueController::class)->names('admin.langues');
Route::resource('regions', RegionController::class)->names('admin.regions');
Route::resource('contenus', ContenuController::class)->names('admin.contenus');
Route::resource('types-contenu', TypeContenuController::class)->names('admin.types_contenu');
Route::resource('types-media', TypeMediaController::class)->names('admin.types_media');
Route::resource('media', MediaController::class)->names('admin.media');
Route::resource('commentaires', CommentaireController::class)->names('admin.commentaires');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('parler', ParlerController::class)->names('admin.parler');

// Routes supplémentaires pour l'admin
Route::get('/statistiques', [DashboardController::class, 'statistics'])->name('admin.statistics');
Route::get('/parametres', [DashboardController::class, 'settings'])->name('admin.settings');