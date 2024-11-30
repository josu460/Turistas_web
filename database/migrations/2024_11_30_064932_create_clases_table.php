<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id(); 
            $table->string('economica')->nullable();
            $table->string('ejecutiva')->nullable();
            $table->string('primera_clase')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
