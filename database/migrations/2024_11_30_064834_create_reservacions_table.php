<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionsTable extends Migration
{
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id(); 
            $table->decimal('precio_total', 10, 2);
            $table->enum('estado', ['Activo', 'Cancelado']); 
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_vuelo')->nullable()->constrained('vuelos')->onDelete('set null');
            $table->foreignId('id_hotel')->nullable()->constrained('hotels')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservaciones');
    }
}
