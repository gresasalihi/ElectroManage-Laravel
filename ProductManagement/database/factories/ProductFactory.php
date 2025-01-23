<?php

namespace Database\Factories;

use App\Models\Product; // Import the Product model
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class; // Explicitly define the model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true), // Generates a product name with 3 words
            'description' => $this->faker->sentence(), // Generates a short product description
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generates a random price between 10 and 1000
            'image' => $this->faker->imageUrl(640, 480, 'products', true, 'Product Image'), // Generates a product image URL
        ];
    }
}
