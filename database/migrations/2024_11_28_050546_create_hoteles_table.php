<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('hotel');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('no_habitaciones');
            $table->integer('calificacion')->nullable(); 
            $table->decimal('precio', 10, 2);
            $table->string('ubicacion');
            $table->text('descripcion');
            $table->text('politicas_cancelacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
}
