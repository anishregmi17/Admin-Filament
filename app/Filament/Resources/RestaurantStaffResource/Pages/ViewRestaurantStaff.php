<?php

namespace App\Filament\Resources\RestaurantStaffResource\Pages;

use App\Filament\Resources\RestaurantStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRestaurantStaff extends ViewRecord
{
    protected static string $resource = RestaurantStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
