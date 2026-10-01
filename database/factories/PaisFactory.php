<?php

namespace Database\Factories;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Pais> */
class PaisFactory extends Factory
{
    protected $model = Pais::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->country(),
            'codigo_iso2' => fake()->unique()->regexify('[A-Z]{2}'),
            'codigo_iso3' => fake()->unique()->regexify('[A-Z]{3}'),
            'codigo_telefonico' => '+57',
            'activo' => true,
        ];
    }
}
