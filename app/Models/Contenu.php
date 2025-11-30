<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contenu extends Model
{
    protected $table = 'contenus';
    protected $primaryKey = 'id_contenu';
    
    protected $fillable = [
        'titre',
        'texte',
        'statut',
        'parent_id',
        'date_validation',
        'id_region',
        'id_langue',
        'id_moderateur',
        'id_type_contenu',
        'id_auteur'
    ];

    protected $casts = [
        'date_creation' => 'datetime',
        'date_validation' => 'datetime',
    ];

    /**
     * Relation avec la région
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'id_region', 'id_region');
    }

    /**
     * Relation avec la langue
     */
    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'Id_langue');
    }

    /**
     * Relation avec le type de contenu
     */
    public function typeContenu(): BelongsTo
    {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu', 'id_type_contenu');
    }

    /**
     * Relation avec l'auteur
     */
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_auteur', 'id_utilisateur');
    }

    /**
     * Relation avec le modérateur
     */
    public function moderateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_moderateur', 'id_utilisateur');
    }

    /**
     * Relation parent (contenu parent)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'parent_id', 'id_contenu');
    }

    /**
     * Relation enfants (sous-contenus)
     */
    public function enfants(): HasMany
    {
        return $this->hasMany(Contenu::class, 'parent_id', 'id_contenu');
    }

    /**
     * Scope pour les contenus approuvés
     */
    public function scopeApprouves($query)
    {
        return $query->where('statut', 'approuve');
    }

    /**
     * Scope pour les contenus en attente
     */
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }

    /**
     * Scope pour les contenus d'un auteur
     */
    public function scopeParAuteur($query, $auteurId)
    {
        return $query->where('id_auteur', $auteurId);
    }

    /**
     * Vérifie si le contenu est approuvé
     */
    public function estApprouve(): bool
    {
        return $this->statut === 'approuve';
    }

    /**
     * Vérifie si le contenu a des enfants
     */
    public function aEnfants(): bool
    {
        return $this->enfants()->exists();
    }
}