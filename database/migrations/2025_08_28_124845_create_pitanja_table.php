<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pokreće migraciju.
     */
    public function up(): void
    {
        Schema::create('pitanja', function (Blueprint $table) {
            $table->id();
            
            // Strani ključ za users tabelu
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Kolona name iz users tabele (čuvamo kopiju za brži pristup)
            $table->string('name');
            
            // Strani ključ za proizvods tabelu
            $table->unsignedBigInteger('proizvod_id');
            $table->foreign('proizvod_id')->references('id')->on('proizvods')->onDelete('cascade');
            
            // Kolona za pitanje
            $table->string('pitanje', 255);
            
            $table->timestamps();
            
            // Indeksi za bolje performanse
            $table->index('user_id');
            $table->index('proizvod_id');
        });
    }

    /**
     * Vraća migraciju.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitanja');
    }
};