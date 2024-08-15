<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use App\Filament\Resources\CustomerResource;

use Filament\Widgets\ChartWidget;

class CustomerOverview extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bubble';
    }

    public static function getWidgets(): array
    {
        return [
            CustomerResource\Widgets\CustomerOverview::class,
        ];
    }
}
