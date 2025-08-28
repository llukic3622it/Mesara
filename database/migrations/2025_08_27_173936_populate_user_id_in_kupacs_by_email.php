<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Popuni user_id samo na osnovu email adrese - JEDNIM SQL upitom
        DB::statement("
            UPDATE kupacs k
            INNER JOIN users u ON k.email = u.email
            SET k.user_id = u.id
            WHERE k.user_id IS NULL
        ");
    }

    public function down()
    {
        DB::table('kupacs')->update(['user_id' => null]);
    }
};