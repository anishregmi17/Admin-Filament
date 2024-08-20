<?php

namespace App\Filament\Resources\FoodOrderingResource\Pages;

use App\Filament\Resources\FoodOrderingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFoodOrdering extends CreateRecord
{
    protected static string $resource = FoodOrderingResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect to the index page after creating a new record
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('view')
                ->label('View Orders')
                ->url(fn() => $this->getResource()::getUrl('index'))
                ->color('primary'),
        ];
    }
}
