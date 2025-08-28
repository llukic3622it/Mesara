<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kupac;

class KupacSeeder extends Seeder
{
    public function run()
    {
        Kupac::insert([
            ['Ime' => 'Marko', 'Prezime' => 'Markovic', 'Email' => 'marko@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['Ime' => 'Jovana', 'Prezime' => 'Jovanovic', 'Email' => 'jovana@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
