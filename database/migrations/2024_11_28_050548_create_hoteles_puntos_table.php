<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesPuntosTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles_puntos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hotel')->constrained('hoteles')->onDelete('cascade');
            $table->foreignId('id_punto')->constrained('puntos_turisticos')->onDelete('cascade');
            $table->integer('distancia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles_puntos');
    }
}

