<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween($min = 100, $max = 1000),
            'color' => collect(['White', 'Green', 'Blue'])->random(),
            'brand' => collect(['Nike', 'Adidas'])->random(),
            'size' => collect(['S', 'M', 'L', 'XL', 'XXL'])->random(),
            'category' => collect(['men', 'women', 'kids'])->random(),
            'description' => fake()->paragraph(5)
        ];
    }
}
