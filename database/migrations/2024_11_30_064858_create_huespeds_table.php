<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuespedsTable extends Migration
{
    public function up()
    {
        Schema::create('huespeds', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_tipopasajeros')->constrained('tipopasajeros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('huespeds');
    }
}
