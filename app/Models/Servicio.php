<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $fillable = ['servicio'];

    // Relación uno a muchos con HotelServicio
    public function hoteles()
    {
        return $this->hasMany(HotelServicio::class, 'id_servicio');
    }
}
