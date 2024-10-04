<?php

namespace App\Filament\Widgets;
use App\Models\FoodOrdering;
use Filament\Widgets\ChartWidget;

class FoodOrderingChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $pendingOrders = FoodOrdering::where('status', 'pending')->count();
        $completedOrders = FoodOrdering::where('status', 'completed')->count();
        $cancelledOrders = FoodOrdering::where('status', 'cancelled')->count();
        return [
            'labels' => ['Pending', 'Completed', 'Cancelled'],
            'datasets' => [
                [
                    'label' => 'Orders by Status',
                    'data' => [
                        $pendingOrders,
                        $completedOrders,
                        $cancelledOrders,
                    ],
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
