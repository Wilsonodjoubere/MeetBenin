<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commentaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'commentaires';
    protected $primaryKey = 'id_commentaire';
    
    protected $fillable = [
        'texte',
        'note',
        'date',
        'id_utilisateur',
        'id_contenu'
    ];

    protected $casts = [
        'date' => 'datetime',
        'note' => 'integer'
    ];

    // AJOUTEZ CETTE MÉTHODE POUR LE ROUTE MODEL BINDING
    public function getRouteKeyName()
    {
        return 'id_commentaire';
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }
}