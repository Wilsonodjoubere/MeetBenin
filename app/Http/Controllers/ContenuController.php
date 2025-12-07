<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\TypeContenu;
use App\Models\User;
use Illuminate\Http\Request;

class ContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenus = Contenu::with(['region', 'langue', 'typeContenu', 'auteur', 'moderateur'])
                    ->orderBy('date_creation', 'desc')
                    ->get();
        
        return view('contenus.index', compact('contenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::orderBy('nom_region')->get();
        $langues = Langue::orderBy('nom_langue')->get();
        $typesContenu = TypeContenu::orderBy('nom_type_contenu')->get();
        $utilisateurs = User::orderBy('nom')->orderBy('prenom')->get();
        $contenusParents = Contenu::whereNull('parent_id')->orderBy('titre')->get();
        
        return view('contenus.create', compact('regions', 'langues', 'typesContenu', 'utilisateurs', 'contenusParents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|in:brouillon,en_attente,approuve,rejete',
            'parent_id' => 'nullable|exists:contenus,id_contenu',
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue', // id_langue en minuscules
            'id_type_contenu' => 'required|exists:type_contenus,id_type_contenu',
            'id_auteur' => 'required|exists:users,id_utilisateur',
            'id_moderateur' => 'nullable|exists:users,id_utilisateur',
        ]);

        $data = $request->all();

        // Si le statut est approuvé, mettre la date de validation
        if ($request->statut === 'approuve') {
            $data['date_validation'] = now();
        }

        Contenu::create($data);

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contenu = Contenu::with([
            'region', 
            'langue', 
            'typeContenu', 
            'auteur', 
            'moderateur',
            'parent',
            'enfants'
        ])->findOrFail($id);
        
        return view('contenus.show', compact('contenu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contenu = Contenu::findOrFail($id);
        $regions = Region::orderBy('nom_region')->get();
        $langues = Langue::orderBy('nom_langue')->get();
        $typesContenu = TypeContenu::orderBy('nom_type_contenu')->get();
        $utilisateurs = User::orderBy('nom')->orderBy('prenom')->get();
        $contenusParents = Contenu::whereNull('parent_id')
                                ->where('id_contenu', '!=', $id)
                                ->orderBy('titre')
                                ->get();
        
        return view('contenus.edit', compact('contenu', 'regions', 'langues', 'typesContenu', 'utilisateurs', 'contenusParents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'statut' => 'required|in:brouillon,en_attente,approuve,rejete',
            'parent_id' => 'nullable|exists:contenus,id_contenu',
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue', // id_langue en minuscules
            'id_type_contenu' => 'required|exists:type_contenus,id_type_contenu',
            'id_auteur' => 'required|exists:users,id_utilisateur',
            'id_moderateur' => 'nullable|exists:users,id_utilisateur',
        ]);

        $data = $request->all();

        // Gestion de la date de validation
        if ($request->statut === 'approuve' && !$contenu->date_validation) {
            $data['date_validation'] = now();
        } elseif ($request->statut !== 'approuve') {
            $data['date_validation'] = null;
        }

        $contenu->update($data);

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->delete();

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu supprimé avec succès');
    }

    /**
     * Approuver un contenu
     */
    public function approuver($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->update([
            'statut' => 'approuve',
            'date_validation' => now(),
            'id_moderateur' => auth()->id()
        ]);

        return redirect()->back()
            ->with('success', 'Contenu approuvé avec succès');
    }

    /**
     * Rejeter un contenu
     */
    public function rejeter($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->update([
            'statut' => 'rejete',
            'id_moderateur' => auth()->id()
        ]);

        return redirect()->back()
            ->with('success', 'Contenu rejeté avec succès');
    }
}