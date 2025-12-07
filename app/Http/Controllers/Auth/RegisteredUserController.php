<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Langue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $langues = Langue::all();
        return view('auth.register', compact('langues'));
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sexe' => ['required', 'string', 'in:M,F'],
            'id_role' => ['required', 'integer', 'in:2,6'], // 2=Createur, 6=Traducteur
            'date_naissance' => ['nullable', 'date'],
            'id_langue' => ['nullable', 'integer', 'exists:langues,id_langue'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Gestion de l'upload de la photo
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $photoName = basename($photoPath);
        }

        // Valeur par défaut pour la langue si non fournie
        $idLangue = $request->id_langue ?? 1;

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ← CHANGEMENT ICI: 'password' au lieu de 'mot_de_passe'
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'statut' => 'actif',
            'id_role' => $request->id_role,
            'photo' => $photoName,
            'id_langue' => $idLangue,
        ]);

        event(new Registered($user));

        // Redirection vers la page de connexion avec message de succès
        return redirect()->route('login')->with('status', 'Votre compte a été créé avec succès. Veuillez vous connecter.');
    }
}