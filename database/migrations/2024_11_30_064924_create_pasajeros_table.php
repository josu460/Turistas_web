<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajerosTable extends Migration
{
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_tipo_pasajero')->constrained('tipopasajeros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasajeros');
    }
}
