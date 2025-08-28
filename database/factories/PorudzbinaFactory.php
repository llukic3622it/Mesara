<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kupac;
use App\Models\Porudzbina;
use App\Models\Zaposleni;

class PorudzbinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Porudzbina::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table' => fake()->word(),
            'kupac_id' => Kupac::factory(),
            'datum_prijave' => fake()->dateTime(),
            'zaposleni_id' => Zaposleni::factory(),
        ];
    }
}
