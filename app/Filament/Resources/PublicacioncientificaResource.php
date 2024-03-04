<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Docente;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Publicacioncientifica;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PublicacioncientificaResource\Pages;
use App\Filament\Resources\PublicacioncientificaResource\RelationManagers;

class PublicacioncientificaResource extends Resource
{
    protected static ?string $model = Publicacioncientifica::class;
    protected static ?string $modelLabel = 'Publicaciones Científicas ';


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
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('año')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(3000)
                    ->required(),
                Forms\Components\TextInput::make('ies')
                    ->label('Nombre Institución')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('observaciones')
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
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('año')
                    ->date()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('ies')
                    ->label('Institución')
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
            'index' => Pages\ListPublicacioncientificas::route('/'),
            'create' => Pages\CreatePublicacioncientifica::route('/create'),
            'edit' => Pages\EditPublicacioncientifica::route('/{record}/edit'),
        ];
    }
}
