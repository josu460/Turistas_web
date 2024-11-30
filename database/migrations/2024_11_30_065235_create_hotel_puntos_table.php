<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelPuntosTable extends Migration
{
    public function up()
    {
        Schema::create('hotelpuntos', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_hotel')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('id_punto')->constrained('puntoturisticos')->onDelete('cascade');
            $table->integer('distancia'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotelpuntos');
    }
}
