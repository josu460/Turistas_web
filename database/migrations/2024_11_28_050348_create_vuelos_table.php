<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVuelosTable extends Migration
{
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('no_vuelo');
            $table->date('fecha_ida');
            $table->date('fecha_regreso')->nullable();
            $table->decimal('precio', 10, 2);
            $table->time('hora');
            $table->integer('duracion'); 
            $table->foreignId('id_aerolinea')->constrained('aerolineas')->onDelete('cascade');
            $table->foreignId('id_origen')->constrained('lugares')->onDelete('cascade');
            $table->foreignId('id_destino')->constrained('lugares')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vuelos');
    }
}

