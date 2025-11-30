<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('nom_role')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required|string|max:50|unique:roles',
        ]);

        Role::create([
            'nom_role' => $request->nom_role
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Rôle créé avec succès');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_role' => 'required|string|max:50|unique:roles,nom_role,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'nom_role' => $request->nom_role
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Rôle modifié avec succès');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rôle supprimé avec succès');
    }
}
?>