<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // 🔥 MODIFICATION ICI : Redirection selon le rôle
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->intended('/', absolute: false);
        }
        
        // Pour les autres rôles (tu peux ajouter plus tard)
        // if ($user->role === 'moderator') {
        //     return redirect()->intended('/moderator', absolute: false);
        // }
        
        // Par défaut, redirige vers la page d'accueil
        return redirect()->intended('/', absolute: false);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}