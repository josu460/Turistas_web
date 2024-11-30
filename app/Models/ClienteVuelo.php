<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteVuelo extends Model
{
    use HasFactory;

    protected $table = 'clientesvuelos';
    protected $fillable = ['id_cliente', 'id_vuelo'];
}
