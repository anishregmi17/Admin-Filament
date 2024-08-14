<?php

namespace App\Filament\Resources\FoodOrderingResource\Pages;

use App\Filament\Resources\FoodOrderingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFoodOrdering extends ViewRecord
{
    protected static string $resource = FoodOrderingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
