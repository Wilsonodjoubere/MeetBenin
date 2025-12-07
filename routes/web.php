<?php
// routes/web.php

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
use App\Http\Controllers\CreateurController;
use App\Http\Controllers\TraducteurController;
// Route pour la page d'accueil publique
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
// CHANGEMENT ICI : Route racine qui redirige vers login si non connecté
Route::get('/', function () {
    if (auth()->check()) {
        // Utilisateur connecté - rediriger vers la page home qui gère les rôles
        return redirect()->route('home');
    }
    // Non connecté - rediriger vers login
    return redirect()->route('login');
});
// Routes pour les contenus
Route::resource('contenus', ContenuController::class);

// Routes supplémentaires pour la modération
Route::post('contenus/{contenu}/approuver', [ContenuController::class, 'approuver'])
    ->name('contenus.approuver')
    ->middleware(['auth', 'role:Administrateur,Modérateur']);

Route::post('contenus/{contenu}/rejeter', [ContenuController::class, 'rejeter'])
    ->name('contenus.rejeter')
    ->middleware(['auth', 'role:Administrateur,Modérateur']);
// TEST SIMPLE - AVANT toute autre route
Route::get('/test-simple', function() {
    return response('<h1>✅ TEST SIMPLE OK</h1><p>Laravel fonctionne</p>');
});

Route::get('/test-auth', function() {
    if (auth()->check()) {
        return response('<h1>✅ AUTH OK</h1><p>User: ' . auth()->user()->email . '</p>');
    } else {
        return response('<h1>❌ NON AUTHENTIFIÉ</h1>');
    }
});

// Routes d'authentification
require __DIR__.'/auth.php';

// Routes pour les redirections selon les rôles
Route::middleware('auth')->group(function () {
    // Route racine après connexion - redirection selon le rôle
    Route::get('/home', function () {
        $user = auth()->user();
        
        // Charger la relation role
        $user->load('role');
        
        $roleName = $user->role->nom_role ?? null;
        
        if (in_array($roleName, ['Administrateur', 'Modérateur', 'Éditeur'])) {
            return redirect()->route('dashboard');
        } elseif ($roleName === 'Createur de Contenu') {
            return redirect()->route('createur.landing');
        } elseif ($roleName === 'Traducteur') {
            return redirect()->route('traducteur.landing');
        }
        
        // Redirection par défaut
        return redirect()->route('dashboard');
    })->name('home');

    // ====================
    // ROUTES PAR RÔLE
    // ====================
    
    // Routes pour administrateurs, modérateurs et éditeurs
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('role:Administrateur,Modérateur,Éditeur');

    // Routes pour créateurs de contenu
    Route::prefix('createur')->middleware('role:Createur de Contenu')->group(function () {
        Route::get('/landing', [CreateurController::class, 'landing'])->name('createur.landing');
        Route::get('/contenus', [CreateurController::class, 'mesContenus'])->name('createur.contenus');
        Route::get('/nouveau', [CreateurController::class, 'creerContenu'])->name('createur.nouveau');
    });

    // Routes pour traducteurs
    Route::prefix('traducteur')->middleware('role:Traducteur')->group(function () {
        Route::get('/landing', [TraducteurController::class, 'landing'])->name('traducteur.landing');
        Route::get('/traductions', [TraducteurController::class, 'mesTraductions'])->name('traducteur.traductions');
        Route::get('/nouvelle-traduction', [TraducteurController::class, 'nouvelleTraduction'])->name('traducteur.nouvelle');
    });

    // ====================
    // ROUTES DE PROFIL
    // ====================
    
    // Routes de profil (accessibles à tous les utilisateurs authentifiés)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ====================
    // ROUTES DE RESSOURCES
    // ====================

    // Routes réservées aux administrateurs et modérateurs
    Route::middleware('role:Administrateur,Modérateur')->group(function () {
        Route::resource('utilisateurs', UtilisateurController::class);
        Route::resource('roles', RoleController::class);
    });

    // Routes accessibles aux administrateurs, modérateurs, éditeurs ET créateurs de contenu
    Route::middleware('role:Administrateur,Modérateur,Éditeur,Createur de Contenu')->group(function () {
        Route::resource('contenus', ContenuController::class);
        Route::resource('media', MediaController::class);
    });

    // Routes accessibles à tous les rôles authentifiés
    Route::resource('langues', LangueController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('type-contenus', TypeContenuController::class);
    Route::resource('types_media', TypeMediaController::class);
    Route::resource('commentaires', CommentaireController::class);
    Route::resource('parler', ParlerController::class);
});

// Routes spécifiques pour traducteurs (version alternative)
Route::middleware(['auth', 'role:Traducteur'])->group(function () {
    Route::get('/traducteur/landing', [TraducteurController::class, 'landing'])
        ->name('traducteur.landing');
    
    Route::get('/traducteur/traductions', [TraducteurController::class, 'mesTraductions'])
        ->name('traducteur.traductions');
    
    Route::get('/traducteur/nouvelle', [TraducteurController::class, 'nouvelleTraduction'])
        ->name('traducteur.nouvelle');
    
    Route::post('/traducteur/demarrer', [TraducteurController::class, 'demarrerTraduction'])
        ->name('traducteur.demarrer');
    
    Route::get('/traducteur/edit/{id}', [TraducteurController::class, 'editTraduction'])
        ->name('traducteur.edit');
    
    Route::put('/traducteur/update/{id}', [TraducteurController::class, 'updateTraduction'])
        ->name('traducteur.update');
    
    Route::post('/traducteur/soumettre/{id}', [TraducteurController::class, 'soumettreTraduction'])
        ->name('traducteur.soumettre');
});