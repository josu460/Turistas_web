<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPunto extends Model
{
    use HasFactory;

    protected $table = 'hotelpuntos';
    protected $fillable = ['id_hotel', 'id_punto', 'distancia'];

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    // Relación con PuntoTuristico
    public function punto()
    {
        return $this->belongsTo(PuntoTuristico::class, 'id_punto');
    }
}
