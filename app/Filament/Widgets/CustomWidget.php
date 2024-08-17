<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Customer;

class CustomWidget extends Widget
{
    protected static string $view = 'filament.widgets.custom-widget';

    public $customers = [];

    public function mount()
    {
        $monthNames = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        // Fetch customer data (example: count customers by created month)
        $customersData = Customer::selectRaw('COUNT(*) as count, strftime("%m", created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Replace month numbers with month names
        $this->customers = [];
        foreach ($customersData as $month => $count) {
            $this->customers[$monthNames[$month]] = $count;
        }
    }
}

