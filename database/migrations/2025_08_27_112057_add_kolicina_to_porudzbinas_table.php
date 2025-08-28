<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKolicinaToPorudzbinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            $table->integer('kolicina')->default(1)->after('proizvod_id');
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
            $table->dropColumn('kolicina');
        });
    }
}