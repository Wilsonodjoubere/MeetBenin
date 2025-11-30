<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur; // ← Utiliser le nouveau modèle
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with(['role', 'langue']) // ← Utilisateur au lieu de User
                    ->orderBy('nom')
                    ->orderBy('prenom')
                    ->get();
        
        return view('utilisateurs.index', compact('utilisateurs')); // ← variable utilisateurs
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('nom_role')->get();
        $langues = Langue::orderBy('nom_langue')->get();
        
        return view('utilisateurs.create', compact('roles', 'langues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:8',
            'sexe' => 'nullable|in:M,F',
            'date_naissance' => 'nullable|date',
            'statut' => 'required|in:actif,inactif,suspendu',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|exists:roles,id',
            'langue_id' => 'required|exists:langues,Id_langue',
        ]);

        $data = $request->all();
        $data['mot_de_passe'] = Hash::make($request->mot_de_passe);

        // Gestion de l'upload de photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos_utilisateurs', 'public');
            $data['photo'] = $photoPath;
        }

        Utilisateur::create($data); // ← Utilisateur au lieu de User

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::with(['role', 'langue'])->findOrFail($id); // ← Utilisateur
        return view('utilisateurs.show', compact('utilisateur')); // ← variable utilisateur
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id); // ← Utilisateur
        $roles = Role::orderBy('nom_role')->get();
        $langues = Langue::orderBy('nom_langue')->get();
        
        return view('utilisateurs.edit', compact('utilisateur', 'roles', 'langues')); // ← utilisateur
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id); // ← Utilisateur

        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email,' . $id . ',id_utilisateur',
            'sexe' => 'nullable|in:M,F',
            'date_naissance' => 'nullable|date',
            'statut' => 'required|in:actif,inactif,suspendu',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|exists:roles,id',
            'langue_id' => 'required|exists:langues,Id_langue',
        ]);

        $data = $request->except('mot_de_passe');

        // Gestion du mot de passe (seulement si fourni)
        if ($request->filled('mot_de_passe')) {
            $data['mot_de_passe'] = Hash::make($request->mot_de_passe);
        }

        // Gestion de l'upload de photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($utilisateur->photo) {
                Storage::disk('public')->delete($utilisateur->photo);
            }
            
            $photoPath = $request->file('photo')->store('photos_utilisateurs', 'public');
            $data['photo'] = $photoPath;
        }

        $utilisateur->update($data); // ← Utilisateur

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id); // ← Utilisateur

        // Supprimer la photo si elle existe
        if ($utilisateur->photo) {
            Storage::disk('public')->delete($utilisateur->photo);
        }

        $utilisateur->delete(); // ← Utilisateur

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès');
    }
}