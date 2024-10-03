<?php

namespace Database\Seeders;

use App\Models\FoodOrdering;
use Illuminate\Database\Seeder;

class FoodOrderingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodOrdering::factory()->count(8)->create();
    }
}
