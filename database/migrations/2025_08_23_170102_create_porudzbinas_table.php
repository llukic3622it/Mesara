<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorudzbinasTable extends Migration
{
    public function up()
    {
        Schema::create('porudzbinas', function (Blueprint $table) {
            $table->bigIncrements('PorudzbinaID');
            $table->unsignedBigInteger('KupacID');
            $table->dateTime('Datum_prijave');
            $table->unsignedBigInteger('ZaposleniID');
            $table->timestamps();

            $table->foreign('KupacID')->references('KupacID')->on('kupacs')->onDelete('cascade');
            $table->foreign('ZaposleniID')->references('ZaposleniID')->on('zaposlenis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('porudzbinas');
    }
}
