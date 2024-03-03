<?php

namespace App\Filament\Resources;

use App\Models\Nrc;
use Filament\Forms;
use Filament\Tables;
use App\Models\Docente;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NrcResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NrcResource\RelationManagers;

class PlanificadorResource extends Resource
{
    protected static ?string $model = Nrc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_sede')
                    ->relationship('sede', 'nombre')
                    ->required(),
                Forms\Components\Select::make('id_periodoacademico')
                    ->relationship('periodoacademico', 'id')
                    ->required(),
                    Forms\Components\Select::make('id_materia')
                    ->relationship('materia', 'nombre')
                    ->required()
                    ->onChange(function ($materiaId) {
                        $docentes = []; // Array vacío para almacenar los docentes asociados
                
                        if ($materiaId) {
                            // Si se selecciona una materia, realizamos una solicitud AJAX para obtener los docentes asociados
                            $docentes = \App\Models\Docente::whereHas('materias', function ($query) use ($materiaId) {
                                $query->where('id', $materiaId);
                            })->get()->map(function ($docente) {
                                return [
                                    'value' => $docente->id,
                                    'label' => $docente->nombre . ' ' . $docente->apellido
                                ];
                            })->toArray();
                        }
                
                        // Devolvemos los docentes asociados como opciones para el campo de selección de docentes
                        return \Filament\Forms\ComponentContainer::make('id_docente')
                            ->state(['options' => $docentes]);
                    }),
                
                Forms\Components\Select::make('id_docente')
                    ->placeholder('Selecciona una materia primero')
                    ->required(),
                
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sede.nombre')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('materia.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodoacademico.periodo_completo')
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.apellido')
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
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
                    Tables\Actions\BulkAction::make('export')
                    ->label('Exportar PDF')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->url(fn (Nrc $record) => route('generateNrcsPDF', $record->id))
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
            'index' => Pages\ListNrcs::route('/'),
            'create' => Pages\CreateNrc::route('/create'),
            'edit' => Pages\EditNrc::route('/{record}/edit'),
        ];
    }
}
