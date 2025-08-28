<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TipProizvoda;

class TipProizvodaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipProizvoda::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table' => fake()->word(),
            'tip_proizvoda' => fake()->word(),
        ];
    }
}
