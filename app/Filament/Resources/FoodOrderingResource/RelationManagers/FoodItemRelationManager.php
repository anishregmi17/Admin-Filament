<?php

namespace App\Filament\Resources\FoodOrderingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class FoodItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'FoodItems'; // Ensure this matches the actual relationship name

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Food Item Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descriptions')
                    ->label('Descriptions')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Toggle::make('availability')
                    ->label('Available')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Food Item Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descriptions')
                    ->label('Descriptions')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money()
                    ->sortable(),
                Tables\Columns\IconColumn::make('availability')
                    ->label('Available')
                    ->boolean(),
            ])
            ->filters([
                // Add custom filters here if needed
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
