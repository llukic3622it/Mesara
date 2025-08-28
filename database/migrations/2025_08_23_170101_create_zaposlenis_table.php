<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZaposlenisTable extends Migration
{
    public function up()
    {
        Schema::create('zaposlenis', function (Blueprint $table) {
            $table->bigIncrements('ZaposleniID');
            $table->string('Ime');
            $table->string('Prezime');
            $table->unsignedBigInteger('PozicijaID');
            $table->timestamps();

            $table->foreign('PozicijaID')->references('PozicijaID')->on('pozicijas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zaposlenis');
    }
}
