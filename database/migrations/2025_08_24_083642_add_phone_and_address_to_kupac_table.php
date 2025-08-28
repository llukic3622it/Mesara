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
        Schema::table('kupacs', function (Blueprint $table) {
            $table->string('telefon', 20)->nullable()->after('email');
            $table->text('adresa')->nullable()->after('telefon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kupacs', function (Blueprint $table) {
            $table->dropColumn(['telefon', 'adresa']);
        });
    }
};