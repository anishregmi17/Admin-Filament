<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RestaurantStaff;

class RestaurantStaffSeeder extends Seeder
{
    public function run()
    {
        RestaurantStaff::factory()->count(8)->create();
    }
}
