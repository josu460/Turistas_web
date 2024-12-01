<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';
    protected $fillable = ['novuelo', 'fechasalida', 'fecharegreso', 'precio', 'hora', 'duracion','imagen', 'id_aerolinea', 'id_origen', 'id_destino','numeroasientos'];

    // Relación muchos a muchos con Clientes
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'clientesvuelos', 'id_vuelo', 'id_cliente');
    }

    // Relación muchos a muchos con Clases
    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'vuelosclases', 'id_vuelos', 'id_clase');
    }

    // Relación uno a muchos con EscalasVuelos
    public function escalas()
    {
        return $this->hasMany(EscalaVuelo::class, 'id_vuelo');
    }

    // Relación con Aerolínea
    public function aerolinea()
    {
        return $this->belongsTo(Aerolinea::class, 'id_aerolinea');
    }

    // Relación con Lugar (origen y destino)
    public function origen()
    {
        return $this->belongsTo(Lugar::class, 'id_origen');
    }

    public function destino()
    {
        return $this->belongsTo(Lugar::class, 'id_destino');
    }
}
