<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    protected $table = 'type_contenus';
    protected $primaryKey = 'id_type_contenu';
    
    protected $fillable = [
        'nom_type_contenu',
        'description'
    ];
    
    public $timestamps = true;
}
?>