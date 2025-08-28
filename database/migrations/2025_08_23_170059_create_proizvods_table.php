<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProizvodsTable extends Migration
{
    public function up()
    {
        Schema::create('proizvods', function (Blueprint $table) {
            $table->bigIncrements('ProizvodID');
            $table->unsignedBigInteger('TipProizvodaID'); // unsignedBigInteger
            $table->string('Status');
            $table->decimal('Cena', 10, 2);
            $table->timestamps();

            $table->foreign('TipProizvodaID')->references('TipProizvodaID')->on('tip_proizvodas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proizvods');
    }
}
