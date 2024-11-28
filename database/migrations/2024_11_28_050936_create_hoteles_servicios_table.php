<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hotel')->constrained('hoteles')->onDelete('cascade');
            $table->foreignId('id_servicio')->constrained('servicios')->onDelete('cascade');
            $table->text('condiciones_uso')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles_servicios');
    }
}
