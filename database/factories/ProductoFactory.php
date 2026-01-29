<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'descripcion' => fake()->text(),
            'precio' => fake()->randomFloat(2, 0, 999999.99),
            'stock' => fake()->numberBetween(-10000, 10000),
            'categoria' => fake()->word(),
            'activo' => fake()->boolean(),
        ];
    }
}
