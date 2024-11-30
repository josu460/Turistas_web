<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;

    protected $table = 'pasajeros';
    protected $fillable = ['id_cliente', 'id_tipo_pasajero'];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con TipoPasajero
    public function tipoPasajero()
    {
        return $this->belongsTo(TipoPasajero::class, 'id_tipo_pasajero');
    }
}
