<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('clientehotels', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_hotel')->constrained('hotels')->onDelete('cascade');
            $table->integer('calificacion_cliente')->nullable();
            $table->text('comentarios_cliente')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientehotels');
    }
}

