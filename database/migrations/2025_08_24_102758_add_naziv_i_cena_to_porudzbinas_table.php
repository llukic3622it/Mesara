<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            // Dodaj proizvod_id bez after
            $table->unsignedBigInteger('proizvod_id');

            // Dodaj naziv i cenu proizvoda
            $table->string('naziv_proizvoda');
            $table->decimal('cena_proizvoda', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('porudzbinas', function (Blueprint $table) {
            $table->dropColumn('cena_proizvoda');
            $table->dropColumn('naziv_proizvoda');
            $table->dropColumn('proizvod_id');
        });
    }
};
