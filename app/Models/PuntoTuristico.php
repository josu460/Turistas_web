<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoTuristico extends Model
{
    use HasFactory;

    protected $table = 'puntosturisticos';
    protected $fillable = ['punto'];

    // Relación uno a muchos con HotelPuntos
    public function hoteles()
    {
        return $this->hasMany(HotelPunto::class, 'id_punto');
    }
}
