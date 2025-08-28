<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pozicija;
use App\Models\Zaposleni;

class ZaposleniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zaposleni::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table' => fake()->word(),
            'ime' => fake()->word(),
            'prezime' => fake()->word(),
            'pozicija_id' => Pozicija::factory(),
        ];
    }
}
