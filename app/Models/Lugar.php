<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $table = 'lugares';
    protected $fillable = ['lugar'];

    // Relación con Vuelos (origen y destino)
    public function vuelosOrigen()
    {
        return $this->hasMany(Vuelo::class, 'id_origen');
    }

    public function vuelosDestino()
    {
        return $this->hasMany(Vuelo::class, 'id_destino');
    }

    // Relación con EscalasVuelos
    public function escalas()
    {
        return $this->hasMany(EscalaVuelo::class, 'id_lugar');
    }
}
