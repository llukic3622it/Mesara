<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePozicijasTable extends Migration
{
    public function up()
    {
        Schema::create('pozicijas', function (Blueprint $table) {
            $table->bigIncrements('PozicijaID');
            $table->string('NazivPozicije');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pozicijas');
    }
}
