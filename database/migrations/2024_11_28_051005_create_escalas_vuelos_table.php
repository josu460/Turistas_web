<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalasVuelosTable extends Migration
{
    public function up()
    {
        Schema::create('escalas_vuelos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vuelo')->constrained('vuelos')->onDelete('cascade');
            $table->foreignId('id_lugar')->constrained('lugares')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('escalas_vuelos');
    }
}
