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

class NrcResource extends Resource
{
    protected static ?string $model = Nrc::class;
    protected static ?string $modelLabel = 'NRCs';

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
                    ->label('Periodo académico')
                    ->required(),
                Forms\Components\Select::make('id_materia')
                    ->relationship('materia', 'nombre')
                    ->required(),
                Forms\Components\Select::make('id_docente')
                    ->relationship(
                        name: 'docente',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('nombre')->orderBy('apellido'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Docente $record) => "{$record->codigo} - {$record->nombre} {$record->apellido}")
                    ->searchable(['cedula', 'codigo', 'nombre', 'apellido'])
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Código')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sede.nombre')
                ->label('Sede')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('materia.nombre')
                    ->label('Materia')
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodoacademico.periodo_completo')
                ->label('Periodo académico')
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.nombre')
                ->label('Nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('docente.apellido')
                ->label('Apellido')
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                ->label('Código')
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
