<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VueloClase extends Model
{
    use HasFactory;

    protected $table = 'vuelosclases';
    protected $fillable = ['id_vuelo', 'id_clase'];

    // Relación con Vuelo
    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'id_vuelo');
    }

    // Relación con Clase
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }
}
