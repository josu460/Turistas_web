<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPasajerosTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_pasajeros', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Ejemplo: Niño, Adulto, Infante
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_pasajeros');
    }
}
