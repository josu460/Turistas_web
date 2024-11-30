<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('hoteleservicios', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_hotel')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('id_servicio')->constrained('servicios')->onDelete('cascade');
            $table->text('condiciones_uso')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteleservicios');
    }
}
