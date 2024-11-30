<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clases';
    protected $fillable = ['economica', 'ejecutiva', 'primera_clase'];

    // Relación con VueloClase
    public function vuelos()
    {
        return $this->hasMany(VueloClase::class, 'id_clase');
    }
}
