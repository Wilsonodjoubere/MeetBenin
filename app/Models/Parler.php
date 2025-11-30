<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parler extends Model
{
    use HasFactory;

    protected $table = 'parler';
    public $timestamps = true;
    public $incrementing = false;
    protected $primaryKey = ['id_region', 'id_langue'];
    
    protected $fillable = [
        'id_region',
        'id_langue'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region', 'id_region');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
    }
}