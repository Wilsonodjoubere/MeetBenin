<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

    protected $table = 'langues';
    protected $primaryKey = 'id_langue';
    protected $fillable = ['nom_langue', 'code_langue', 'description'];
    public $timestamps = true;

    /**
     * Relation avec les utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_langue', 'id_langue');
    }
}