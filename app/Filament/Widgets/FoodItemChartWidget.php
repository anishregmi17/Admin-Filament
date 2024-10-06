<?php

namespace App\Filament\Widgets;

use App\Models\FoodItem;
use Filament\Widgets\ChartWidget;

class FoodItemChartWidget extends ChartWidget
{
    protected static ?string $heading = 'FoodItems Chart';
    protected static ?int $sort = 3;
    protected function getData(): array
    {
        $availableItems = FoodItem::where('availability', 1)->count();
        $unavailableItems = FoodItem::where('availability', 0)->count();
        return [
            'labels' => ['Available', 'Unavailable'],
            'datasets' => [
                [
                    'label' => 'Food Item Availability',
                    'data' => [
                        $availableItems,
                        $unavailableItems,
                    ],
                    'backgroundColor' => ['#36A2EB', '#FF6384'],
                    'hoverBackgroundColor' => ['#36A2EB', '#FF6384'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
