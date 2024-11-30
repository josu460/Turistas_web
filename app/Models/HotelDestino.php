<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDestino extends Model
{
    use HasFactory;

    protected $table = 'hotelesdestinos';
    protected $fillable = ['id_hotel', 'id_lugar'];

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    // Relación con Lugar
    public function lugar()
    {
        return $this->belongsTo(Lugar::class, 'id_lugar');
    }
}
