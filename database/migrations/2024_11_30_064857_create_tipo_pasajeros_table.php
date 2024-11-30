<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPasajerosTable extends Migration
{
    public function up()
    {
        Schema::create('tipopasajeros', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipopasajeros');
    }
}
