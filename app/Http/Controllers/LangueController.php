<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;
use Illuminate\Support\Facades\Validator;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langues = Langue::all();
        return view('langues.index', compact('langues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Langue::create($request->all());

        return redirect()->route('langues.index')
            ->with('success', 'Langue créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $langue = Langue::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues,code_langue,' . $id . ',id_langue',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $langue->update($request->all());

        return redirect()->route('langues.index')
            ->with('success', 'Langue mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $langue = Langue::findOrFail($id);
        $langue->delete();

        return redirect()->route('langues.index')
            ->with('success', 'Langue supprimée avec succès!');
    }

    /**
     * API endpoint pour les opérations AJAX (édition en ligne)
     */
    public function apiUpdate(Request $request, $id)
    {
        $langue = Langue::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nom_langue' => 'sometimes|required|string|max:255',
            'code_langue' => 'sometimes|required|string|max:10|unique:langues,code_langue,' . $id . ',id_langue',
            'description' => 'sometimes|nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $langue->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Langue mise à jour avec succès',
            'langue' => $langue
        ]);
    }
}