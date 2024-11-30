<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelDestinosTable extends Migration
{
    public function up()
    {
        Schema::create('hoteldestinos', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_hotel')->constrained('hotels')->onDelete('cascade');
            $table->foreignId('id_lugar')->constrained('lugares')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteldestinos');
    }
}
