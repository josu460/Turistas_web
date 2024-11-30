<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteVuelosTable extends Migration
{
    public function up()
    {
        Schema::create('clientevuelos', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_vuelo')->constrained('vuelos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientevuelos');
    }
}

