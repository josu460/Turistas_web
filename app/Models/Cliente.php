<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = ['nombres', 'apellidos', 'email', 'telefono', 'contraseña'];

    // Relación con Reservaciones
    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'id_cliente');
    }

    // Relación con Vuelos
    public function vuelos()
    {
        return $this->belongsToMany(Vuelo::class, 'clientesvuelos', 'id_cliente', 'id_vuelo');
    }

    // Relación con Huéspedes
    public function huespedes()
    {
        return $this->hasMany(Huesped::class, 'id_cliente');
    }

    // Relación con ClientesHoteles
    public function clientesHoteles()
    {
        return $this->hasMany(ClienteHotel::class, 'id_cliente');
    }
}
