<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Codigoareaconocimiento;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $modelLabel = 'Materia';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_codigoareaconocimiento')
                    ->label('Área de Conocimiento')
                    ->relationship(
                        name: 'codigoareaconocimiento',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('codigo'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Codigoareaconocimiento $record) => "{$record->grado->nombre} - {$record->codigo} - {$record->areaconocimiento->nombre}")
                    ->searchable(['codigo'])
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('horas_teoria')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('horas_laboratorio')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('horas_otros')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('codigoareaconocimiento.areaconocimiento.nombre')
                    ->label('Área de Conocimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_teoria')
                    ->label('Horas Teoría')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_laboratorio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horas_otros')
                    ->numeric()
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }
}
