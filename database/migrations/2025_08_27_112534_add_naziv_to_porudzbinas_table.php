<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNazivToPorudzbinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            // Dodajte Naziv nakon proizvod_id ili neke druge postojeće kolone
            $table->string('Naziv', 255)->nullable()->after('proizvod_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            $table->dropColumn('Naziv');
        });
    }
}