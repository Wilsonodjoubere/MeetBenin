<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'types_media';
    
    protected $fillable = [
        'nom',
        'description', 
        'extension',
        'statut',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'statut' => 'boolean',
    ];

    public function createur()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function modificateur()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'type_media_id');
    }
}