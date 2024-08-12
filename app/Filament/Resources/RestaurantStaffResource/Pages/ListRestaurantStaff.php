<?php

namespace App\Filament\Resources\RestaurantStaffResource\Pages;

use App\Filament\Resources\RestaurantStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestaurantStaff extends ListRecords
{
    protected static string $resource = RestaurantStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
