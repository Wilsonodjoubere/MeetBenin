<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateurController extends Controller
{
    /**
     * Affiche le tableau de bord du créateur
     */
    public function landing()
    {
        $user = Auth::user();
        
        // Statistiques du créateur - utilisez 'id_auteur' au lieu de 'user_id'
        $stats = [
            'contenus_crees' => Contenu::where('id_auteur', $user->id_utilisateur)->count(),
            'contenus_publies' => Contenu::where('id_auteur', $user->id_utilisateur)
                ->where('statut', 'publié')->count(),
            'contenus_attente' => Contenu::where('id_auteur', $user->id_utilisateur)
                ->where('statut', 'en_attente')->count(),
            'contenus_brouillon' => Contenu::where('id_auteur', $user->id_utilisateur)
                ->where('statut', 'brouillon')->count(),
        ];

        // Contenus récents
        $contenusRecents = Contenu::where('id_auteur', $user->id_utilisateur)
            ->with('typeContenu')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('createur.landing', compact('stats', 'contenusRecents'));
    }
    
    /**
     * Affiche la liste des contenus du créateur
     */
    public function mesContenus()
    {
        $user = Auth::user();
        
        $contenus = Contenu::where('id_auteur', $user->id_utilisateur)
            ->with(['typeContenu', 'region', 'langue'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('createur.contenus', compact('contenus'));
    }
    
    /**
     * Affiche le formulaire de création de contenu
     */
    public function nouveauContenu()
    {
        $typesContenu = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();
        
        return view('createur.nouveau', compact('typesContenu', 'regions', 'langues'));
    }
    
    /**
     * Enregistre un nouveau contenu
     */
    public function storeContenu(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'id_type_contenu' => 'required|exists:type_contenus,id_type_contenu',
            'id_region' => 'nullable|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue',
        ]);

        Contenu::create([
            'titre' => $request->titre,
            'texte' => $request->texte,
            'id_type_contenu' => $request->id_type_contenu,
            'id_region' => $request->id_region,
            'id_langue' => $request->id_langue,
            'id_auteur' => Auth::id(),
            'statut' => 'en_attente',
        ]);

        return redirect()->route('createur.contenus')
            ->with('success', 'Contenu créé avec succès! Il est maintenant en attente de validation.');
    }
}