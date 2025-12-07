<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    // Supprimez ou commentez cette ligne, Laravel utilisera automatiquement 'regions'
    // protected $table = 'region'; // ← À SUPPRIMER OU MODIFIER
    
    // OU si vous voulez être explicite :
    protected $table = 'regions'; // ← 'regions' au pluriel
    
    protected $primaryKey = 'id_region';
    
    protected $fillable = [
        'nom_region',
        'description',
        'population',
        'superficie',
        'localisation'
    ];

    /**
     * Relation avec les contenus
     */
    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_region', 'id_region');
    }
}