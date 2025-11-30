<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    
    protected $fillable = [
        'nom',
        'prenom', 
        'email',
        'mot_de_passe',
        'sexe',
        'date_naissance',
        'statut',
        'photo',
        'role_id',
        'langue_id'
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_inscription' => 'datetime',
    ];

    /**
     * Relation avec la table roles
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Relation avec la table langues
     */
    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'langue_id', 'Id_langue');
    }
}