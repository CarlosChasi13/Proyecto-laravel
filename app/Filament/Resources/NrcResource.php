<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NrcResource\Pages;
use App\Filament\Resources\NrcResource\RelationManagers;
use App\Models\Nrc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NrcResource extends Resource
{
    protected static ?string $model = Nrc::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_sede')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_periodoacademico')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_materia')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_docente')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_sede')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_periodoacademico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_materia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_docente')
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
            'index' => Pages\ListNrcs::route('/'),
            'create' => Pages\CreateNrc::route('/create'),
            'edit' => Pages\EditNrc::route('/{record}/edit'),
        ];
    }
}
