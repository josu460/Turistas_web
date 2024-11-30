<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteHotel extends Model
{
    use HasFactory;

    protected $table = 'clienteshoteles';
    protected $fillable = ['id_cliente', 'id_hotel', 'calificacion_cliente', 'comentarios_cliente'];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}
