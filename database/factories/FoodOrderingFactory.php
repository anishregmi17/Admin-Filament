<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\FoodItem;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodOrdering>
 */
class FoodOrderingFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'food_item_id' => FoodItem::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(
                ['pending', 'completed', 'cancelled']
            )
        ];
    }
}
