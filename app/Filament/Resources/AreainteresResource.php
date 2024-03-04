<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreainteresResource\Pages;
use App\Filament\Resources\AreainteresResource\RelationManagers;
use App\Models\Areainteres;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreainteresResource extends Resource
{
    protected static ?string $model = Areainteres::class;

    protected static ?string $modelLabel = 'Área de Interés';

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
                Forms\Components\Select::make('id_areaconocimiento')
                    ->label('Área de conocimiento')
                    ->relationship('areaconocimiento', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('tema')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('descripcion')
                     ->label('Descripción')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('areaconocimiento.nombre')
                    ->label('Área de Conocimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tema')
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
            'index' => Pages\ListAreainteres::route('/'),
            'create' => Pages\CreateAreainteres::route('/create'),
            'edit' => Pages\EditAreainteres::route('/{record}/edit'),
        ];
    }
}
