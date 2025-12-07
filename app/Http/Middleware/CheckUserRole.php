<?php
// app/Http/Middleware/CheckUserRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Récupérer le rôle de l'utilisateur
        $userRole = \App\Models\Role::find($user->id_role);
        
        if (!$userRole) {
            return redirect()->route('dashboard')->with('error', 'Rôle non trouvé.');
        }

        // Vérifier si l'utilisateur a un des rôles requis
        foreach ($roles as $requiredRole) {
            if ($userRole->nom_role === $requiredRole) {
                return $next($request);
            }
        }

        // Redirection selon le rôle
        $roleName = $userRole->nom_role;
        
        if (in_array($roleName, ['Administrateur', 'Modérateur', 'Éditeur'])) {
            return redirect()->route('dashboard');
        } elseif ($roleName === 'Createur de Contenu') {
            return redirect()->route('createur.landing');
        } elseif ($roleName === 'Traducteur') {
            return redirect()->route('traducteur.landing');
        } elseif ($roleName === 'Visiteur') {
            return redirect()->route('welcome');
        }

        return redirect()->route('dashboard')->with('error', 'Accès non autorisé.');
    }
}