<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;

    protected $table = 'huespedes';
    protected $fillable = ['id_cliente', 'id_tipopasajero'];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con TipoPasajero
    public function tipoPasajero()
    {
        return $this->belongsTo(TipoPasajero::class, 'id_tipopasajero');
    }
}
