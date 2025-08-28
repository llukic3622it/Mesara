<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipProizvodasTable extends Migration
{
    public function up()
    {
        Schema::create('tip_proizvodas', function (Blueprint $table) {
            $table->bigIncrements('TipProizvodaID'); // bigIncrements umesto id()
            $table->string('TipProizvoda');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tip_proizvodas');
    }
}
