<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKupacsTable extends Migration
{
    public function up()
    {
        Schema::create('kupacs', function (Blueprint $table) {
            $table->id('KupacID'); // AUTO_INCREMENT PRIMARY KEY
            $table->string('Ime');
            $table->string('Prezime');
            $table->string('Email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kupacs');
    }
}
