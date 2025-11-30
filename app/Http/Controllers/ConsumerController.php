<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumerController extends Controller
{
    /**
     * Afficher la page de présentation
     */
    public function presentation()
    {
        return view('consumer.presentation');
    }

    /**
     * Afficher le profil de l'utilisateur
     */
    public function profile()
    {
        $user = Auth::user();
        return view('consumer.profile', compact('user'));
    }

    /**
     * Mettre à jour le profil de l'utilisateur
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('consumer.profile')
            ->with('success', 'Profil mis à jour avec succès');
    }
}