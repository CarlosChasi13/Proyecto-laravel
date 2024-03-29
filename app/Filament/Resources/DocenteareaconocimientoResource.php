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

    protected static ?string $modelLabel = 'Áreas de Conocimiento';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_docente')
                    ->label('Docente')
                    ->options(Docente::all()->pluck('full_name', 'id'))
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make('id_codigoareaconocimiento')
                    ->label('Categorización área de conocimiento')
                    ->relationship(
                        name: 'codigoareaconocimiento',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('codigo'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Codigoareaconocimiento $record) => "{$record->grado->nombre} - {$record->codigo} - {$record->areaconocimiento->nombre}")
                    ->searchable(['codigo'])
                    ->required(),
                Forms\Components\Select::make('id_docente')
                    ->label('Docente')
                    ->options(Docente::all()->pluck('area_names', 'id'))
                    ->multiple()
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
                    ->label('Código')
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigoareaconocimiento.grado.nombre')
                    ->label('Nivel')
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigoareaconocimiento.areaconocimiento.nombre')
                    ->label('Área de Conocimiento')
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
