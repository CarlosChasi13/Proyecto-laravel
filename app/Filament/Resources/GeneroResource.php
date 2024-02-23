<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneroResource\Pages;
use App\Filament\Resources\GeneroResource\RelationManagers;
use App\Models\Genero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeneroResource extends Resource
{
    protected static ?string $model = Genero::class;

    protected static ?int $navigationSort = 99;

    protected static ?string $navigationLabel = 'Géneros';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGeneros::route('/'),
            'create' => Pages\CreateGenero::route('/create'),
            'edit' => Pages\EditGenero::route('/{record}/edit'),
        ];
    }
}
