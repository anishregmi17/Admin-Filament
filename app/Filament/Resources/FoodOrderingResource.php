<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodOrderingResource\Pages;
use App\Models\Customer;
use App\Models\FoodItem;
use App\Models\FoodOrdering;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FoodOrderingResource extends Resource
{
    protected static ?string $model = FoodOrdering::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('customer_id')
                    ->relationship('customer', 'name')  // Assuming 'name' is the column you want to display
                    ->required()
                    ->searchable(),
                Forms\Components\BelongsToSelect::make('food_item_id')
                    ->relationship('foodItem', 'name')  // Assuming 'name' is the column you want to display
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')  // Accessing the related model's 'name' column
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('foodItem.name')  // Accessing the related model's 'name' column
                    ->label('Food Item')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add filters here if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define any relationships for this resource
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
