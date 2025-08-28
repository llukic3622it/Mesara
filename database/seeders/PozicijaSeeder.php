<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pozicija;

class PozicijaSeeder extends Seeder
{
    public function run()
    {
        Pozicija::insert([
            ['NazivPozicije' => 'Prodavac', 'created_at' => now(), 'updated_at' => now()],
            ['NazivPozicije' => 'Sanker', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
