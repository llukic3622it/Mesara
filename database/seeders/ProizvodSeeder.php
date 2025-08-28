<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodSeeder extends Seeder
{
    public function run()
    {
        Proizvod::insert([
            ['TipProizvodaID' => 1, 'Status' => 'dostupan', 'Cena' => 500.00, 'created_at' => now(), 'updated_at' => now()],
            ['TipProizvodaID' => 2, 'Status' => 'nedostupan', 'Cena' => 150.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
