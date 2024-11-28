<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAerolineasTable extends Migration
{
    public function up()
    {
        Schema::create('aerolineas', function (Blueprint $table) {
            $table->id();
            $table->string('aerolinea');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aerolineas');
    }
}
