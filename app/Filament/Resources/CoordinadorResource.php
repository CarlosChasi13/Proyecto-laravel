<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocemateriaResource\Pages;
use App\Filament\Resources\DocemateriaResource\RelationManagers;
use App\Models\Docemateria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoordinadorResource extends Resource
{
    protected static ?string $model = Docemateria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_docente')
    ->relationship('docente', 'nombre')
    ->query(function ($query) use ($selectedMateriaId) {
        $query->join('docematerias', 'docente.id', '=', 'docematerias.id_docente')
            ->join('materia', 'docematerias.id_materia', '=', 'materia.id')
            ->join('docenteareaconocimiento', 'docente.id', '=', 'docenteareaconocimiento.id_docente')
            ->where('materia.id', '=', $selectedMateriaId)
            ->select('docente.id', 'docente.nombre', 'docente.apellido')
            ->distinct();
    })
    ->getOptionLabelFromRecordUsing(function ($record) {
        return $record->nombre . ' ' . $record->apellido;
    })
    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('materia.nombre')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('docente.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.apellido')
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
            'index' => Pages\ListDocematerias::route('/'),
            'create' => Pages\CreateDocemateria::route('/create'),
            'edit' => Pages\EditDocemateria::route('/{record}/edit'),
        ];
    }
}
