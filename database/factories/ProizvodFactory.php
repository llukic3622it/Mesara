<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Proizvod;
use App\Models\TipProizvoda;

class ProizvodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proizvod::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'table' => fake()->word(),
            'tip_proizvoda_id' => TipProizvoda::factory(),
            'status' => fake()->word(),
            'cena' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}
