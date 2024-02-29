<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Docente;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Areaconocimiento;
use Filament\Resources\Resource;
use App\Models\Codigoareaconocimiento;
use App\Models\Docenteareaconocimiento;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DocenteareaconocimientoResource\Pages;
use App\Filament\Resources\DocenteareaconocimientoResource\RelationManagers;

class DocenteareaconocimientoResource extends Resource
{
    protected static ?string $model = Docenteareaconocimiento::class;

    protected static ?string $modelLabel = 'Área de Conocimiento';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_docente')
                    ->relationship(
                        name: 'docente',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('nombre')->orderBy('apellido'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Docente $record) => "{$record->codigo} - {$record->nombre} {$record->apellido}")
                    ->searchable(['cedula', 'codigo', 'nombre', 'apellido'])
                    ->required(),
                Forms\Components\Select::make('id_codigoareaconocimiento')
                    ->relationship(
                        name: 'codigoareaconocimiento',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('codigo'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Codigoareaconocimiento $record) => "{$record->grado->nombre} - {$record->codigo} - {$record->areaconocimiento->nombre}")
                    ->searchable(['codigo'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('docente.nombre')
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('docente.apellido')
                    ->label('Apellido'),
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('export')
                    ->label('Exportar PDF')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->url(fn (Docenteareaconocimiento $record) => route('generateAreasPDF', $record->id))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListDocenteareaconocimientos::route('/'),
            'create' => Pages\CreateDocenteareaconocimiento::route('/create'),
            'edit' => Pages\EditDocenteareaconocimiento::route('/{record}/edit'),
        ];
    }
}
