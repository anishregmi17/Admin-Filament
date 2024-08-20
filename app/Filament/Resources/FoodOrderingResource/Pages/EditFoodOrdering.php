<?php

namespace App\Filament\Resources\FoodOrderingResource\Pages;

use App\Filament\Resources\FoodOrderingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodOrdering extends EditRecord
{
    protected static string $resource = FoodOrderingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ButtonAction::make('duplicate')
                ->label('Duplicate Order')
                ->action('duplicateOrder')
                ->color('secondary'),
        ];
    }

    protected function duplicateOrder()
    {
        $newOrder = $this->record->replicate();
        $newOrder->save();

        $this->notify('success', 'Order duplicated successfully!');

        return redirect(FoodOrderingResource::getUrl('edit', ['record' => $newOrder->getKey()]));
    }
}
