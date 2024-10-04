<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\User;
use App\Models\FoodItem;
use App\Models\RestaurantStaff;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers', Customer::count())
                ->description('Number of customers')
                ->color('success'),

            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->color('primary'),

            Stat::make('Total Food Items', FoodItem::count())
                ->description('Food items available')
                ->color('info'),

            Stat::make('Total Staff Members', RestaurantStaff::count())
                ->description('Number of restaurant staff')
                ->color('warning'),
        ];
    }
}
