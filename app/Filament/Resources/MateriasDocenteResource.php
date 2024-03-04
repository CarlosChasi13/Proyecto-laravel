<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Docente;
use App\Models\Materia;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\CreateAction;
use App\Models\Codigoareaconocimiento;
use App\Models\Docenteareaconocimiento;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MateriasDocenteResource\Pages;
use App\Filament\Resources\MateriasDocenteResource\RelationManagers;
use App\Filament\Resources\CodigoareaconocimientoResource\RelationManagers\AreaconocimientoRelationManager;

class MateriasDocenteResource extends Resource
{
    protected static ?string $model = Docenteareaconocimiento::class;

    protected static ?string $modelLabel = 'Asignacion';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('id_codigoareaconocimiento')
                ->label('Materia')
                ->relationship('codigoareaconocimiento.materia', 'nombre')
                ->required(),
            Forms\Components\Select::make('id_docente')
                ->label('Docente')
                ->options(Docente::all()->pluck('full_name', 'id'))
                ->multiple()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('docente.full_name')
                ->label('Docente'),
            Tables\Columns\TextColumn::make('codigoareaconocimiento.codigo')
                ->sortable(),
            Tables\Columns\TextColumn::make('codigoareaconocimiento.grado.nombre')
                ->sortable(),
            Tables\Columns\TextColumn::make('codigoareaconocimiento.areaconocimiento.nombre')
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMateriasDocentes::route('/'),
            'create' => Pages\CreateMateriasDocente::route('/create'),
            'edit' => Pages\EditMateriasDocente::route('/{record}/edit'),
        ];
    }
}
