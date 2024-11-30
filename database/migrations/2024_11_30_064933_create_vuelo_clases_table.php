<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVueloClasesTable extends Migration
{
    public function up()
    {
        Schema::create('vueloclases', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_vuelo')->constrained('vuelos')->onDelete('cascade');
            $table->foreignId('id_clase')->constrained('clases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vueloclases');
    }
}

