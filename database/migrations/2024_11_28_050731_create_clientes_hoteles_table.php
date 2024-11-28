<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesHotelesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes_hoteles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('id_hotel')->constrained('hoteles')->onDelete('cascade');
            $table->integer('calificacion_cliente')->nullable();
            $table->text('comentarios_cliente')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes_hoteles');
    }
}
