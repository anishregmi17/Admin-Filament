<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RestaurantStaff;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantStaff>
 */
class RestaurantStaffFactory extends Factory
{
    protected $model = RestaurantStaff::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'profile' => $this->faker->imageUrl(200, 200, 'people', true, 'Profile'),
            'role' => $this->faker->randomElement(['Manager', 'Chef', 'Waiter', 'Cashier']),
            'contact' => $this->faker->phoneNumber,
        ];
    }
}
