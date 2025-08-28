<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipProizvoda;

class TipProizvodaSeeder extends Seeder
{
    public function run()
    {
        TipProizvoda::insert([
            ['TipProizvoda' => 'Meso', 'created_at' => now(), 'updated_at' => now()],
            ['TipProizvoda' => 'Sir', 'created_at' => now(), 'updated_at' => now()],
            ['TipProizvoda' => 'Pecivo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
