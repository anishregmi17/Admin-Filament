<?php

namespace App\Filament\Resources\RestaurantStaffResource\Pages;

use App\Filament\Resources\RestaurantStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantStaff extends EditRecord
{
    protected static string $resource = RestaurantStaffResource::class;

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
