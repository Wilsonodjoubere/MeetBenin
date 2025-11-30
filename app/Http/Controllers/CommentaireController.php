<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur', 'contenu'])
                                ->orderBy('date', 'desc')
                                ->get();
        
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $utilisateurs = User::all();
        $contenus = Contenu::all();
        
        return view('commentaires.create', compact('utilisateurs', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:1|max:5',
            'id_utilisateur' => 'required|exists:users,id',
            'id_contenu' => 'required|exists:contenus,id_contenu',
        ]);

        Commentaire::create([
            'texte' => $request->texte,
            'note' => $request->note,
            'date' => now(),
            'id_utilisateur' => $request->id_utilisateur,
            'id_contenu' => $request->id_contenu,
        ]);

        return redirect()->route('commentaires.index')
                        ->with('success', 'Commentaire créé avec succès.');
    }

    public function show(Commentaire $commentaire)
    {
        $commentaire->load(['utilisateur', 'contenu']);
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $utilisateurs = User::all();
        $contenus = Contenu::all();
        
        return view('commentaires.edit', compact('commentaire', 'utilisateurs', 'contenus'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:1|max:5',
            'id_utilisateur' => 'required|exists:users,id',
            'id_contenu' => 'required|exists:contenus,id_contenu',
        ]);

        $commentaire->update([
            'texte' => $request->texte,
            'note' => $request->note,
            'id_utilisateur' => $request->id_utilisateur,
            'id_contenu' => $request->id_contenu,
        ]);

        return redirect()->route('commentaires.index')
                        ->with('success', 'Commentaire modifié avec succès.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaires.index')
                        ->with('success', 'Commentaire supprimé avec succès.');
    }
}