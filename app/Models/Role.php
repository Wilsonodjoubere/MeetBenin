<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    public $timestamps = true;

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'nom_role',
    ];

    /**
     * Relation avec les utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}