<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Usuario';

    protected static ?string $navigationLabel = 'Usuarios';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->autocapitalize('words')
                ->label('Nombre')
                ->maxLength(50)
                ->placeholder('Juan')
                ->required(),
                TextInput::make('email')
                ->email()
                ->required(),
                TextInput::make('password')
                ->password()
                ->visibleOn('create')
                ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                ->required(),
                Select::make('roles')
                ->relationship('roles', 'name')
                ->required(),
                DatePicker::make('email_verified_at')
                ->label('Verificación del correo')
                ->readonly(true)
                ->visibleOn('edit'),
                DatePicker::make('created_at')
                ->label('Creación del correo')
                ->readonly(true)
                ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('roles.name'),
                TextColumn::make('email_verified_at')
                    ->label('Verificación del correo')
                    ->placeholder('Desactivado'),
                TextColumn::make('created_at')
                ->label('Creación del correo'),
            ])
            ->filters([
                Tables\Filters\Filter::make('Activos')
                 ->query(fn (Builder $query):Builder => $query->whereNotNull('email_verified_at'))
                 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Activar')
                ->icon('heroicon-m-check-badge')
                ->color('success')
                ->action(function (User $user){
                    $user->email_verified_at = Date('Y-m-d H:i:s');
                    $user->save();
                }),
                Tables\Actions\Action::make('Desactivar')
                ->icon('heroicon-m-x-circle')
                ->color('danger')
                ->action(function (User $user){
                    $user->email_verified_at = null;
                    $user->save();
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
