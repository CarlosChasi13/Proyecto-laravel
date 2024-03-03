<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiglaResource\Pages;
use App\Filament\Resources\SiglaResource\RelationManagers;
use App\Models\Sigla;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiglaResource extends Resource
{
    protected static ?string $model = Sigla::class;
    protected static ?string $modelLabel = 'Siglas del Semestre';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(5),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->label('Descripción')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
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
            'index' => Pages\ListSiglas::route('/'),
            'create' => Pages\CreateSigla::route('/create'),
            'edit' => Pages\EditSigla::route('/{record}/edit'),
        ];
    }
}
