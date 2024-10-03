<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodItem>
 */
class FoodItemFactory extends Factory
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
            'descriptions' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'availability' => $this->faker->boolean(),
        ];
    }
}
