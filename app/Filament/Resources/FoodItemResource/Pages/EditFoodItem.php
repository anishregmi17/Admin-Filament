<?php

namespace App\Filament\Resources\FoodItemResource\Pages;

use App\Filament\Resources\FoodItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodItem extends EditRecord
{
    protected static string $resource = FoodItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
