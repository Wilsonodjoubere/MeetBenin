<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_utilisateur';

    protected $fillable = [
        'nom',
        'prenom', 
        'email',
        'password',  // ← CHANGE ICI
        'sexe',
        'date_naissance',
        'statut',
        'id_role',
        'photo',
        'id_langue',
        'remember_token',
    ];

    protected $hidden = [
        'password',  // ← CHANGE ICI
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_naissance' => 'date',
            'password' => 'hashed',  // ← OPTIONNEL
        ];
    }

    // PAS BESOIN de getAuthPassword() maintenant
    // Laravel utilisera automatiquement 'password'

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
    }
}