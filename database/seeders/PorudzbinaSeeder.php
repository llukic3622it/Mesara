<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Porudzbina;
use Carbon\Carbon;

class PorudzbinaSeeder extends Seeder
{
    public function run()
    {
        Porudzbina::insert([
            [
                'KupacID' => 1,
                'Datum_prijave' => Carbon::now()->addDay(), // ne može biti u prošlosti
                'ZaposleniID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
