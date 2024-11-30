<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id(); 
            $table->string('hotel');
            $table->integer('nohabitaciones');
            $table->integer('calificacion_estrellas')->nullable(); // Opcional
            $table->decimal('precio', 10, 2);
            $table->string('ubicacion');
            $table->text('descripcion')->nullable();
            $table->text('politicas_cancelacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
