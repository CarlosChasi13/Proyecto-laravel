<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CodigoareaconocimientoResource\Pages;
use App\Filament\Resources\CodigoareaconocimientoResource\RelationManagers;
use App\Models\Codigoareaconocimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CodigoareaconocimientoResource extends Resource
{
    protected static ?string $model = Codigoareaconocimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_grado')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_areaconocimiento')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_grado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_areaconocimiento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
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
            'index' => Pages\ListCodigoareaconocimientos::route('/'),
            'create' => Pages\CreateCodigoareaconocimiento::route('/create'),
            'edit' => Pages\EditCodigoareaconocimiento::route('/{record}/edit'),
        ];
    }
}
