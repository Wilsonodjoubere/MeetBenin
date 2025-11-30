<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeContenus = TypeContenu::orderBy('nom_type_contenu')->get();
        return view('types_contenus.index', compact('typeContenus')); // ← types_contenus
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types_contenus.create'); // ← types_contenus
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_type_contenu' => 'required|string|max:100|unique:type_contenus',
            'description' => 'nullable|string',
        ]);

        TypeContenu::create($request->all());

        return redirect()->route('type-contenus.index')
            ->with('success', 'Type de contenu créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeContenu = TypeContenu::findOrFail($id);
        return view('types_contenus.show', compact('typeContenu')); // ← types_contenus
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $typeContenu = TypeContenu::findOrFail($id);
        return view('types_contenus.edit', compact('typeContenu')); // ← types_contenus
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_type_contenu' => 'required|string|max:100|unique:type_contenus,nom_type_contenu,' . $id . ',id_type_contenu',
            'description' => 'nullable|string',
        ]);

        $typeContenu = TypeContenu::findOrFail($id);
        $typeContenu->update($request->all());

        return redirect()->route('type-contenus.index')
            ->with('success', 'Type de contenu modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $typeContenu = TypeContenu::findOrFail($id);
        $typeContenu->delete();

        return redirect()->route('type-contenus.index')
            ->with('success', 'Type de contenu supprimé avec succès');
    }
}