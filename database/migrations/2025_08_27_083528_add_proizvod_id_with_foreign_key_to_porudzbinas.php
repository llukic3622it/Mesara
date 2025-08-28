<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            // Prvo dodajte kolonu
            $table->unsignedBigInteger('proizvod_id')->nullable()->after('ZaposleniID');
            
            // Zatim dodajte foreign key
            $table->foreign('proizvod_id')
                  ->references('ProizvodID')  // OBRATITE PAŽNJU: references('ProizvodID') a ne 'id'
                  ->on('proizvods')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            // Prvo uklonite foreign key
            $table->dropForeign(['proizvod_id']);
            
            // Zatim uklonite kolonu
            $table->dropColumn('proizvod_id');
        });
    }
};