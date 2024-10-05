<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\FoodOrdering;
use App\Models\User;
use App\Models\FoodItem;
use App\Models\RestaurantStaff;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [

            Stat::make('Total Staff Members', RestaurantStaff::count())
                ->description('Number of restaurant staff')
                ->chart([7, 2, 10, 3, 15, 4, 54])
                ->color('warning'),

            Stat::make('Total Customers', Customer::count())
                ->description('Number of customers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Total Food Items', FoodItem::count())
                ->description('Food items available')
                ->chart([7, 2, 10, 3, 15, 4, 47])
                ->color('info'),

            Stat::make('Total Food Orderings', FoodOrdering::count())
                ->description('Customers Food Orderings')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->chart([7, 2, 10, 3, 15, 4, 37])
                ->color('primary'),
        ];
    }
}
