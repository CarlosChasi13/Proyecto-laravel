<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicacioncientificaResource\Pages;
use App\Filament\Resources\PublicacioncientificaResource\RelationManagers;
use App\Models\Publicacioncientifica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicacioncientificaResource extends Resource
{
    protected static ?string $model = Publicacioncientifica::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_docente')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('año')
                    ->required(),
                Forms\Components\TextInput::make('ies')
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
                Tables\Columns\TextColumn::make('id_docente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('año')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ies')
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
