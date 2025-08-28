<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pozicija;

class PozicijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pozicija::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table' => fake()->word(),
            'naziv_pozicije' => fake()->word(),
        ];
    }
}
