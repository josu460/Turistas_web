<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelServicio extends Model
{
    use HasFactory;

    protected $table = 'hotelesservicios';
    protected $fillable = ['id_hotel', 'id_servicio', 'condiciones_uso'];

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
