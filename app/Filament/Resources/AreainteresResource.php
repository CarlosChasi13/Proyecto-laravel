<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreainteresResource\Pages;
use App\Filament\Resources\AreainteresResource\RelationManagers;
use App\Models\Areainteres;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_docente')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_areaconocimiento')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tema')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('descripcion')
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
                Tables\Columns\TextColumn::make('id_areaconocimiento')
                    ->numeric()
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
