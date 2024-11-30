<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPasajero extends Model
{
    use HasFactory;

    protected $table = 'tipospasajeros';
    protected $fillable = ['tipo'];

    // Relación con Huespedes
    public function huespedes()
    {
        return $this->hasMany(Huesped::class, 'id_tipopasajero');
    }
}
