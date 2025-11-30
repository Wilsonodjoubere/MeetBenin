<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $table = 'region'; // ← Table au singulier
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