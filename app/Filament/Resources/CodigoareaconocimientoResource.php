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

    protected static ?string $modelLabel = 'Categorización Áreas de Conocimiento';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_grado')
                    ->label('Nivel')
                    ->relationship('grado', 'nombre')
                    ->required(),
                Forms\Components\Select::make('id_areaconocimiento')
                    ->label('Área de conocimiento')
                    ->relationship('areaconocimiento', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Código')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grado.nombre')
                ->label('Nivel')
                    ->sortable(),
                Tables\Columns\TextColumn::make('areaconocimiento.nombre')
                ->label('Área de Conocimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                ->label('Código')
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
