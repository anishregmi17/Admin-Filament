<?php

namespace App\Filament\Resources\FoodOrderingResource\Pages;

use App\Filament\Resources\FoodOrderingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodOrderings extends ListRecords
{
    protected static string $resource = FoodOrderingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
