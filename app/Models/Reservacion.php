<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';
    protected $fillable = ['precio_total', 'estado', 'id_cliente', 'id_vuelo', 'id_hotel'];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con Vuelo
    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'id_vuelo');
    }

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
