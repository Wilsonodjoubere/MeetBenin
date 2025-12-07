<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Langue;
use App\Models\Traduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TraducteurController extends Controller
{
    /**
     * Affiche la page d'accueil des traducteurs
     */
    public function landing()
    {
        try {
            // Vérifier l'authentification
            if (!Auth::check()) {
                return redirect('/login');
            }
            
            $user = Auth::user();
            
            // DONNÉES FACTICES POUR TEST - Version corrigée avec id_traduction
            $data = [
                'stats' => [
                    'traductions_terminees' => 15,
                    'traductions_encours' => 3,
                    'traductions_attente' => 7,
                    'langues_maitrisees' => 4,
                ],
                'traductionsRecentes' => [
                    (object)[
                        'id_traduction' => 1, // AJOUTÉ
                        'contenu' => (object)['titre' => 'Histoire du Royaume du Dahomey'],
                        'langueSource' => (object)['nom_langue' => 'Français'],
                        'langueCible' => (object)['nom_langue' => 'Fon'],
                        'statut' => 'en_cours'
                    ],
                    (object)[
                        'id_traduction' => 2, // AJOUTÉ
                        'contenu' => (object)['titre' => 'Recette de Akassa'],
                        'langueSource' => (object)['nom_langue' => 'Français'],
                        'langueCible' => (object)['nom_langue' => 'Yoruba'],
                        'statut' => 'terminee'
                    ],
                    (object)[
                        'id_traduction' => 3, // AJOUTÉ
                        'contenu' => (object)['titre' => 'Proverbes Béninois'],
                        'langueSource' => (object)['nom_langue' => 'Français'],
                        'langueCible' => (object)['nom_langue' => 'Goun'],
                        'statut' => 'en_attente'
                    ]
                ],
                'contenusATraduire' => [
                    (object)[
                        'id_contenu' => 1,
                        'titre' => 'Les Rois du Dahomey',
                        'langue' => (object)['nom_langue' => 'Français'],
                        'typeContenu' => (object)['nom' => 'Article historique'],
                        'created_at' => now()
                    ],
                    (object)[
                        'id_contenu' => 2,
                        'titre' => 'Chants traditionnels Fon',
                        'langue' => (object)['nom_langue' => 'Français'],
                        'typeContenu' => (object)['nom' => 'Culture'],
                        'created_at' => now()->subDays(2)
                    ],
                    (object)[
                        'id_contenu' => 3,
                        'titre' => 'Artisanat local',
                        'langue' => (object)['nom_langue' => 'Français'],
                        'typeContenu' => (object)['nom' => 'Documentation'],
                        'created_at' => now()->subDays(5)
                    ]
                ],
                'languesTraducteur' => [
                    (object)['id_langue' => 1, 'nom_langue' => 'Fon'],
                    (object)['id_langue' => 2, 'nom_langue' => 'Yoruba'],
                    (object)['id_langue' => 3, 'nom_langue' => 'Goun'],
                    (object)['id_langue' => 4, 'nom_langue' => 'Français']
                ]
            ];
            
            // Retourner la vue avec les données
            return view('traducteur.landing', $data);
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@landing: ' . $e->getMessage());
            
            // Afficher une page d'erreur simple
            return response()->view('errors.simple', [
                'message' => 'Erreur lors du chargement du tableau de bord.',
                'details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Affiche la liste des traductions du traducteur
     */
    public function mesTraductions()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login');
            }
            
            // Version avec données factices pour tester
            $traductions = [
                (object)[
                    'id_traduction' => 1,
                    'contenu' => (object)['titre' => 'Histoire du Dahomey'],
                    'langueSource' => (object)['nom_langue' => 'Français'],
                    'langueCible' => (object)['nom_langue' => 'Fon'],
                    'statut' => 'en_cours',
                    'date_debut' => now()->subDays(3),
                    'date_fin' => null
                ],
                (object)[
                    'id_traduction' => 2,
                    'contenu' => (object)['titre' => 'Recette de Akassa'],
                    'langueSource' => (object)['nom_langue' => 'Français'],
                    'langueCible' => (object)['nom_langue' => 'Yoruba'],
                    'statut' => 'terminee',
                    'date_debut' => now()->subDays(10),
                    'date_fin' => now()->subDays(2)
                ]
            ];

            return view('traducteur.traductions', ['traductions' => $traductions]);
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@mesTraductions: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Affiche le formulaire pour nouvelle traduction
     */
    public function nouvelleTraduction()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login');
            }
            
            // Données factices pour tester
            $contenusATraduire = [
                (object)[
                    'id_contenu' => 1,
                    'titre' => 'Histoire des Rois du Dahomey',
                    'typeContenu' => (object)['nom' => 'Article historique'],
                    'langue' => (object)['nom_langue' => 'Français']
                ],
                (object)[
                    'id_contenu' => 2,
                    'titre' => 'Chants traditionnels',
                    'typeContenu' => (object)['nom' => 'Culture'],
                    'langue' => (object)['nom_langue' => 'Français']
                ]
            ];

            $languesCibles = [
                (object)['id_langue' => 1, 'nom_langue' => 'Fon'],
                (object)['id_langue' => 2, 'nom_langue' => 'Yoruba'],
                (object)['id_langue' => 3, 'nom_langue' => 'Goun']
            ];

            return view('traducteur.nouvelle', [
                'contenusATraduire' => $contenusATraduire,
                'languesCibles' => $languesCibles
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@nouvelleTraduction: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Démarrer une nouvelle traduction
     */
    public function demarrerTraduction(Request $request)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login');
            }
            
            $request->validate([
                'id_contenu' => 'required|exists:contenus,id_contenu',
                'id_langue_cible' => 'required|exists:langues,id_langue',
            ]);

            // Simulation de création
            $traductionId = rand(100, 999);
            
            return redirect()->route('traducteur.edit', $traductionId)
                ->with('success', 'Traduction démarrée avec succès!');
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@demarrerTraduction: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Affiche le formulaire d'édition de traduction
     */
    public function editTraduction($id)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->route('login');
            }
            
            // Données factices
            $traduction = (object)[
                'id_traduction' => $id,
                'contenu' => (object)[
                    'titre' => 'Histoire du Royaume du Dahomey',
                    'texte' => 'Le Royaume du Dahomey était un État africain précolonial situé dans l\'actuel Bénin...'
                ],
                'langueSource' => (object)['nom_langue' => 'Français'],
                'langueCible' => (object)['nom_langue' => 'Fon'],
                'texte_traduit' => 'Traduction en cours...',
                'statut' => 'en_cours'
            ];

            return view('traducteur.edit', compact('traduction'));
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@editTraduction: ' . $e->getMessage());
            return redirect()->route('traducteur.traductions')
                ->with('error', 'Traduction non trouvée.');
        }
    }

    /**
     * Met à jour une traduction
     */
    public function updateTraduction(Request $request, $id)
    {
        try {
            $request->validate([
                'texte_traduit' => 'required|string',
                'statut' => 'sometimes|in:en_cours,en_attente'
            ]);

            $user = Auth::user();
            
            // Simulation de mise à jour
            $message = $request->statut == 'en_attente' 
                ? 'Traduction soumise pour validation!'
                : 'Traduction sauvegardée!';

            return redirect()->route('traducteur.traductions')
                ->with('success', $message);
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@updateTraduction: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Soumettre une traduction pour validation
     */
    public function soumettreTraduction($id)
    {
        try {
            $user = Auth::user();
            
            // Simulation
            return redirect()->route('traducteur.traductions')
                ->with('success', 'Traduction soumise pour validation!');
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@soumettreTraduction: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Affiche les détails d'une traduction
     */
    public function showTraduction($id)
    {
        try {
            $user = Auth::user();
            
            // Données factices
            $traduction = (object)[
                'id_traduction' => $id,
                'contenu' => (object)[
                    'titre' => 'Histoire du Royaume du Dahomey',
                    'texte' => 'Contenu original...'
                ],
                'langueSource' => (object)['nom_langue' => 'Français'],
                'langueCible' => (object)['nom_langue' => 'Fon'],
                'texte_traduit' => 'Traduction complète...',
                'statut' => 'terminee',
                'date_debut' => now()->subDays(5),
                'date_fin' => now()->subDays(1),
                'traducteur' => (object)[
                    'nom' => $user->nom,
                    'prenom' => $user->prenom
                ]
            ];

            return view('traducteur.show', compact('traduction'));
            
        } catch (\Exception $e) {
            Log::error('Erreur TraducteurController@showTraduction: ' . $e->getMessage());
            return redirect()->route('traducteur.traductions')
                ->with('error', 'Traduction non trouvée.');
        }
    }
}