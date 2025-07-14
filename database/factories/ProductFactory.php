<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'sku' => $this->faker->unique()->word(),
            'image_path' => $this->faker->imageUrl(),
            'is_active' => $this->faker->boolean(80), // 80% chance to be active
            'category_id' => Category::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
