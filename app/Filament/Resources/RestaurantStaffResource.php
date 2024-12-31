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
use App\Enums\RestaurantRoles;

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
                    ->label('Full Name')
                    ->placeholder('Enter full name')
                    ->required()
                    ->maxLength(100)
                    ->minLength(3)
                    ->prefixIcon('heroicon-o-user')
                    ->autofocus()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('name', ucwords(strtolower($state))))
                    ->columnSpan(2),

                Forms\Components\FileUpload::make('profile')
                    ->label('Profile Picture')
                    ->image()
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('300')
                    ->directory('uploads/profile_images')
                    ->columnSpan(2),

                Forms\Components\Select::make('role')
                    ->required()
                    ->searchable()
                    ->options(collect(RestaurantRoles::cases())->mapWithKeys(fn($role) => [$role->value => $role->label()]))
                    ->label('Role')
                    ->helperText(fn($get) => RestaurantRoles::tryFrom($get('role'))?->description())
                    ->reactive()
                    ->placeholder('Select a role'),

                Forms\Components\TextInput::make('contact')
                    ->label('Contact Number')
                    ->required()
                    ->tel()
                    ->placeholder('Enter 10-digit phone number')
                    ->maxLength(10)
                    ->minLength(10)
                    ->prefixIcon('heroicon-o-phone')
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
                    ->label('Staff Name')
                    ->sortable()
                    ->searchable()
                    ->color('primary')
                    ->wrap(),

                Tables\Columns\ImageColumn::make('profile')
                    ->label('Profile Picture')
                    ->circular()
                    ->width(60)
                    ->height(60)
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'restaurant_manager' => 'success',
                        'head_chef' => 'warning',
                        'sous_chef' => 'secondary',
                        'waiter' => 'primary',
                        'host' => 'info',
                        'bartender' => 'primary',
                        'line_cook' => 'gray',
                        'dishwasher' => 'danger',
                        'prep_cook' => 'secondary',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('contact')
                    ->label('Contact Number')
                    ->sortable()
                    ->searchable()
                    ->alignCenter()
                    ->icon('heroicon-o-phone')
                    ->iconPosition('before')
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('F j, Y, g:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('success')
                    ->alignRight(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('F j, Y, g:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('primary')
                    ->alignRight(),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deleted At')
                    ->dateTime('F j, Y, g:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('danger')
                    ->alignRight(),
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
