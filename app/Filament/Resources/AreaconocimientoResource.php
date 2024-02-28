<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaconocimientoResource\Pages;
use App\Filament\Resources\AreaconocimientoResource\RelationManagers;
use App\Models\Areaconocimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaconocimientoResource extends Resource
{
    protected static ?string $model = Areaconocimiento::class;

    protected static ?string $modelLabel = 'Área de Conocimiento';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
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
            'index' => Pages\ListAreaconocimientos::route('/'),
            'create' => Pages\CreateAreaconocimiento::route('/create'),
            'edit' => Pages\EditAreaconocimiento::route('/{record}/edit'),
        ];
    }
}
