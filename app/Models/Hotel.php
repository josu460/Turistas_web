<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    
    protected $fillable = [
        'hotel', 'checkin', 'checkout', 'nohabitaciones', 
        'calificacion_estrellas', 'precio', 'ubicacion', 
        'descripcion', 'politicas_cancelacion'
    ];

    // Relación N:N con Destinos (Lugares) a través de la tabla intermedia 'hotelesdestinos'
    public function destinos()
    {
        return $this->belongsToMany(Lugar::class, 'hoteldestinos', 'id_hotel', 'id_lugar');
    }

    // Relación con ClientesHoteles
    public function clientesHoteles()
    {
        return $this->hasMany(ClienteHotel::class, 'id_hotel');
    }

    // Relación con HotelServicios
    public function servicios()
    {
        return $this->hasMany(HotelServicio::class, 'id_hotel');
    }

    // Relación con HotelPuntos
    public function puntos()
    {
        return $this->hasMany(HotelPunto::class, 'id_hotel');
    }
}
