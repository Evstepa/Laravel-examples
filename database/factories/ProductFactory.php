<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'sku' => strtoupper(Str::random(2))  . '/'
                . (string)rand(0, 100) . '/'
                . (string)rand(0, 1000),
            'name' => fake()->sentence(2),
            'price' => rand(1, 999999) / 1000,
            'category_id' => Category::all()->random()->id,
            // 'category_id' => Category::factory(),
        ];
    }
}
