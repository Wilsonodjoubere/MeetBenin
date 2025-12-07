<?php
// app/Http/Controllers/UtilisateurController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Langue;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UtilisateurController extends Controller  // IMPORTANT : Doit être UtilisateurController, pas UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = User::with(['role', 'langue'])->get();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langues = Langue::all();
        $roles = Role::all();
        return view('utilisateurs.create', compact('langues', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'sexe' => ['required', 'string', 'in:M,F'],
            'date_naissance' => ['nullable', 'date'],
            'statut' => ['required', 'string', 'in:actif,inactif'],
            'id_role' => ['required', 'integer', 'exists:roles,id_role'],
            'id_langue' => ['nullable', 'integer', 'exists:langues,id_langue'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Gestion de l'upload de la photo
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $photoName = basename($photoPath);
        }

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'statut' => $request->statut,
            'id_role' => $request->id_role,
            'id_langue' => $request->id_langue,
            'photo' => $photoName,
        ]);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load(['role', 'langue']);
        return view('utilisateurs.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $langues = Langue::all();
        $roles = Role::all();
        return view('utilisateurs.edit', compact('user', 'langues', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id_utilisateur . ',id_utilisateur'],
            'sexe' => ['required', 'string', 'in:M,F'],
            'date_naissance' => ['nullable', 'date'],
            'statut' => ['required', 'string', 'in:actif,inactif'],
            'id_role' => ['required', 'integer', 'exists:roles,id_role'],
            'id_langue' => ['nullable', 'integer', 'exists:langues,id_langue'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'statut' => $request->statut,
            'id_role' => $request->id_role,
            'id_langue' => $request->id_langue,
        ];

        // Gestion du mot de passe (seulement si fourni)
        if ($request->filled('password')) {
            $data['mot_de_passe'] = Hash::make($request->password);
        }

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo) {
                Storage::delete('public/photos/' . $user->photo);
            }
            
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = basename($photoPath);
        }

        $user->update($data);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Supprimer la photo si elle existe
        if ($user->photo) {
            Storage::delete('public/photos/' . $user->photo);
        }

        $user->delete();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Activer un utilisateur
     */
    public function activate(User $user)
    {
        $user->update(['statut' => 'actif']);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur activé avec succès.');
    }

    /**
     * Désactiver un utilisateur
     */
    public function deactivate(User $user)
    {
        $user->update(['statut' => 'inactif']);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur désactivé avec succès.');
    }
}