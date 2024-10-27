<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantStaffResource\Pages;
use App\Models\RestaurantStaff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RestaurantStaffResource extends Resource
{
    protected static ?string $model = RestaurantStaff::class;
    protected static ?string $navigationGroup = 'Restaurant Staff';
    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\FileUpload::make('profile')
                    ->image(),
                Forms\Components\Select::make('role')
                    ->required()
                    ->searchable()
                    ->options([
                        'restaurant_manager' => 'Restaurant Manager',
                        'head_chef' => 'Head Chef (Executive Chef)',
                        'sous_chef' => 'Sous Chef',
                        'waiter' => 'Waiter/Waitress (Server)',
                        'host' => 'Host/Hostess',
                        'bartender' => 'Bartender',
                        'line_cook' => 'Line Cook',
                        'dishwasher' => 'Dishwasher',
                        'prep_cook' => 'Prep Cook',
                    ])
                    ->label('Role'),

                Forms\Components\TextInput::make('contact')
                    ->label('Contact Number')
                    ->required()
                    ->tel()
                    ->placeholder('Enter 10-digit phone number')
                    ->maxLength(10)
                    ->minLength(10)
                    ->prefixIcon('heroicon-o-phone')
                    ->hint('Please enter a 10-digit phone number')
                    ->hintIcon('heroicon-s-information-circle')
                    ->autofocus()
                    ->extraInputAttributes(['pattern' => '[0-9]{10}', 'inputmode' => 'numeric'])
                    ->unique(ignoreRecord: true)
                    ->reactive()

            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('profile')
                    ->width(50)
                    ->height(50),
                Tables\Columns\TextColumn::make('role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Role')
                    ->options([
                        'restaurant_manager' => 'Restaurant Manager',
                        'head_chef' => 'Head Chef (Executive Chef)',
                        'sous_chef' => 'Sous Chef',
                        'waiter' => 'Waiter/Waitress (Server)',
                        'host' => 'Host/Hostess',
                        'bartender' => 'Bartender',
                        'line_cook' => 'Line Cook',
                        'dishwasher' => 'Dishwasher',
                        'prep_cook' => 'Prep Cook',
                    ]),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestaurantStaff::route('/'),
            'create' => Pages\CreateRestaurantStaff::route('/create'),
            'view' => Pages\ViewRestaurantStaff::route('/{record}'),
            'edit' => Pages\EditRestaurantStaff::route('/{record}/edit'),
        ];
    }
}
