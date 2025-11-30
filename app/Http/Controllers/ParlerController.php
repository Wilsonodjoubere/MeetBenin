<?php

namespace App\Http\Controllers;

use App\Models\Parler;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParlerController extends Controller
{
    public function index()
    {
        $parlers = Parler::with(['region', 'langue'])
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('parler.index', compact('parlers'));
    }

    public function create()
    {
        $regions = Region::all();
        $langues = Langue::all();
        
        return view('parler.create', compact('regions', 'langues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue',
        ]);

        // Vérifier si la combinaison existe déjà
        $exists = DB::table('parler')
                   ->where('id_region', $request->id_region)
                   ->where('id_langue', $request->id_langue)
                   ->exists();

        if ($exists) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Cette association région-langue existe déjà.');
        }

        try {
            // Utiliser DB::table pour l'insertion
            DB::table('parler')->insert([
                'id_region' => $request->id_region,
                'id_langue' => $request->id_langue,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('parler.index')
                            ->with('success', 'Association région-langue créée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    public function show($id_region, $id_langue)
    {
        $parler = Parler::with(['region', 'langue'])
                       ->where('id_region', $id_region)
                       ->where('id_langue', $id_langue)
                       ->firstOrFail();
        
        return view('parler.show', compact('parler'));
    }

    public function edit($id_region, $id_langue)
    {
        $parler = Parler::with(['region', 'langue'])
                       ->where('id_region', $id_region)
                       ->where('id_langue', $id_langue)
                       ->firstOrFail();
        
        $regions = Region::all();
        $langues = Langue::all();
        
        return view('parler.edit', compact('parler', 'regions', 'langues'));
    }

    public function update(Request $request, $id_region, $id_langue)
    {
        $request->validate([
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue',
        ]);

        try {
            // Vérifier si la nouvelle combinaison existe déjà (sauf l'actuelle)
            $exists = DB::table('parler')
                       ->where('id_region', $request->id_region)
                       ->where('id_langue', $request->id_langue)
                       ->where('id_region', '!=', $id_region)
                       ->where('id_langue', '!=', $id_langue)
                       ->exists();

            if ($exists) {
                return redirect()->back()
                               ->withInput()
                               ->with('error', 'Cette association région-langue existe déjà.');
            }

            // Mettre à jour avec DB::table
            DB::table('parler')
                ->where('id_region', $id_region)
                ->where('id_langue', $id_langue)
                ->update([
                    'id_region' => $request->id_region,
                    'id_langue' => $request->id_langue,
                    'updated_at' => now(),
                ]);

            return redirect()->route('parler.index')
                            ->with('success', 'Association région-langue modifiée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Erreur lors de la modification : ' . $e->getMessage());
        }
    }

    public function destroy($id_region, $id_langue)
    {
        try {
            DB::table('parler')
                ->where('id_region', $id_region)
                ->where('id_langue', $id_langue)
                ->delete();

            return redirect()->route('parler.index')
                            ->with('success', 'Association région-langue supprimée avec succès.');

        } catch (\Exception $e) {
            return redirect()->route('parler.index')
                           ->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}