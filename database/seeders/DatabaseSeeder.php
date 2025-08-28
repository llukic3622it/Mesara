<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TipProizvodaSeeder::class,
            KupacSeeder::class,
            PozicijaSeeder::class,
            ZaposleniSeeder::class,
            ProizvodSeeder::class,
            PorudzbinaSeeder::class,
        ]);
    }
}
