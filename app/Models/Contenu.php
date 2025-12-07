<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contenu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_contenu';
    
    protected $fillable = [
        'titre',
        'texte',
        'statut',
        'parent_id',
        'id_region',
        'id_langue',
        'id_type_contenu',
        'id_auteur',
        'id_moderateur',
        'date_validation'
    ];
    
    protected $casts = [
        'date_validation' => 'datetime',
        'date_creation' => 'datetime'
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
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
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
        return $this->belongsTo(User::class, 'id_auteur', 'id_utilisateur'); // Utilisateur -> User
    }

    /**
     * Relation avec le modérateur
     */
    public function moderateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_moderateur', 'id_utilisateur'); // Utilisateur -> User
    }

    /**
     * Relation avec le contenu parent
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'parent_id', 'id_contenu');
    }

    /**
     * Relation avec les contenus enfants
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
     * Scope pour les contenus rejetés
     */
    public function scopeRejetes($query)
    {
        return $query->where('statut', 'rejete');
    }

    /**
     * Scope pour les contenus brouillons
     */
    public function scopeBrouillons($query)
    {
        return $query->where('statut', 'brouillon');
    }

    /**
     * Vérifie si le contenu est approuvé
     */
    public function estApprouve(): bool
    {
        return $this->statut === 'approuve';
    }

    /**
     * Vérifie si le contenu est en attente
     */
    public function estEnAttente(): bool
    {
        return $this->statut === 'en_attente';
    }

    /**
     * Vérifie si le contenu est rejeté
     */
    public function estRejete(): bool
    {
        return $this->statut === 'rejete';
    }

    /**
     * Vérifie si le contenu est un brouillon
     */
    public function estBrouillon(): bool
    {
        return $this->statut === 'brouillon';
    }
}