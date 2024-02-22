<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperiencialaboralResource\Pages;
use App\Filament\Resources\ExperiencialaboralResource\RelationManagers;
use App\Models\Experiencialaboral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperiencialaboralResource extends Resource
{
    protected static ?string $model = Experiencialaboral::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_docente')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('entidad')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('cargo')
                    ->required()
                    ->maxLength(20),
                Forms\Components\DatePicker::make('fecha_ingreso')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_salida')
                    ->required(),
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
                Tables\Columns\TextColumn::make('entidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_ingreso')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_salida')
                    ->date()
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
            'index' => Pages\ListExperiencialaborals::route('/'),
            'create' => Pages\CreateExperiencialaboral::route('/create'),
            'edit' => Pages\EditExperiencialaboral::route('/{record}/edit'),
        ];
    }
}
