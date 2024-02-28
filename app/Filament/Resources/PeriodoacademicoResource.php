<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodoacademicoResource\Pages;
use App\Filament\Resources\PeriodoacademicoResource\RelationManagers;
use App\Models\Periodoacademico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodoacademicoResource extends Resource
{
    protected static ?string $model = Periodoacademico::class;

    protected static ?string $modelLabel = 'Periodo Académico';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_grado')
                    ->label('Grado')
                    ->relationship('grado', 'nombre')
                    ->required(),
                Forms\Components\Select::make('id_sigla')
                    ->label('Sigla')
                    ->relationship('sigla', 'nombre')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('periodo_completo')
                    ->sortable(),
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
            'index' => Pages\ListPeriodoacademicos::route('/'),
            'create' => Pages\CreatePeriodoacademico::route('/create'),
            'edit' => Pages\EditPeriodoacademico::route('/{record}/edit'),
        ];
    }
}
