<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocenteareaconocimientoResource\Pages;
use App\Filament\Resources\DocenteareaconocimientoResource\RelationManagers;
use App\Models\Docenteareaconocimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocenteareaconocimientoResource extends Resource
{
    protected static ?string $model = Docenteareaconocimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_codigoareaconocimiento')
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
                Tables\Columns\TextColumn::make('id_codigoareaconocimiento')
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
