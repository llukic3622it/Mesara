<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zaposleni;

class ZaposleniSeeder extends Seeder
{
    public function run()
    {
        Zaposleni::insert([
            ['Ime' => 'Petar', 'Prezime' => 'Petrovic', 'PozicijaID' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['Ime' => 'Ana', 'Prezime' => 'Anic', 'PozicijaID' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
