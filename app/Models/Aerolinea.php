<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    use HasFactory;

    protected $table = 'aerolineas';
    protected $fillable = ['aerolinea'];

    // Relación con Vuelos
    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'id_aerolinea');
    }
}
