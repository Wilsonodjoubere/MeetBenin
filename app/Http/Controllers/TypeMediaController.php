<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeMediaController extends Controller
{
    public function index()
    {
        $typesMedia = TypeMedia::orderBy('created_at', 'desc')->get();
        
        return view('types_media.index', compact('typesMedia'));
    }

    public function create()
    {
        return view('types_media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:types_media,nom',
            'code' => 'required|string|max:10|unique:types_media,code',
            'description' => 'nullable|string',
        ]);

        TypeMedia::create([
            'nom' => $request->nom,
            'code' => $request->code,
            'description' => $request->description,
            'statut' => true,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('types-media.index')
                        ->with('success', 'Type de média créé avec succès.');
    }

    public function show(TypeMedia $typeMedia)
    {
        return view('types_media.show', compact('typeMedia'));
    }

    public function edit(TypeMedia $typeMedia)
    {
        return view('types_media.edit', compact('typeMedia'));
    }

    public function update(Request $request, TypeMedia $typeMedia)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:types_media,nom,' . $typeMedia->id,
            'code' => 'required|string|max:10|unique:types_media,code,' . $typeMedia->id,
            'description' => 'nullable|string',
        ]);

        $typeMedia->update([
            'nom' => $request->nom,
            'code' => $request->code,
            'description' => $request->description,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('types-media.index')
                        ->with('success', 'Type de média modifié avec succès.');
    }

    public function destroy(TypeMedia $typeMedia)
    {
        if($typeMedia->medias()->exists()) {
            return redirect()->back()
                        ->with('error', 'Impossible de supprimer ce type, il est utilisé par des médias.');
        }

        $typeMedia->delete();

        return redirect()->route('types-media.index')
                        ->with('success', 'Type de média supprimé avec succès.');
    }
}