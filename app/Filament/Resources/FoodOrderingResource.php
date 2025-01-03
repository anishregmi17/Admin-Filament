<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodOrderingResource\Pages;
use App\Filament\Resources\FoodOrderingResource\RelationManagers\CustomerRelationManager;
use App\Filament\Resources\FoodOrderingResource\RelationManagers\FoodItemRelationManager;
use App\Models\FoodOrdering;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;


class FoodOrderingResource extends Resource
{
    protected static ?string $model = FoodOrdering::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $navigationGroup = 'Customers Food Ordering';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->searchable()
                    ->label('Customer'),

                Forms\Components\Select::make('food_item_id')
                    ->relationship('foodItem', 'name')
                    ->required()
                    ->searchable()
                    ->label('Food Item'),

                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Quantity'),

                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled',
                    ])
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('foodItem.name')
                    ->label('Food Item')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled',
                    ]),
                SelectFilter::make('customer_id')
                ->relationship('customer', 'name')
                ->label('Customer'),
                
                SelectFilter::make('food_item_id')
                ->relationship('foodItem', 'name')
                ->label('Food Item'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
                    ->label('Actions')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('gray')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
                    ->button()
                    ->color('gray'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FoodItemRelationManager::class,
            CustomerRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFoodOrderings::route('/'),
            'create' => Pages\CreateFoodOrdering::route('/create'),
            'view' => Pages\ViewFoodOrdering::route('/{record}'),
            'edit' => Pages\EditFoodOrdering::route('/{record}/edit'),
        ];
    }
}
