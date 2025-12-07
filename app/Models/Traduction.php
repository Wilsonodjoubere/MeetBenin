<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traduction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_traduction';

    protected $fillable = [
        'id_contenu',
        'id_langue_source',
        'id_langue_cible',
        'id_traducteur',
        'texte_traduit',
        'statut',
        'date_debut',
        'date_fin',
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu', 'id_contenu');
    }

    public function langueSource()
    {
        return $this->belongsTo(Langue::class, 'id_langue_source', 'id_langue');
    }

    public function langueCible()
    {
        return $this->belongsTo(Langue::class, 'id_langue_cible', 'id_langue');
    }

    public function traducteur()
    {
        return $this->belongsTo(User::class, 'id_traducteur', 'id_utilisateur');
    }
}