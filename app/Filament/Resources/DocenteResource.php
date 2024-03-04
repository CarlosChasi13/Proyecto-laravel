<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Docente;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DocenteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DocenteResource\RelationManagers;

class DocenteResource extends Resource
{
    protected static ?string $model = Docente::class;

    protected static ?string $navigationLabel = 'Docentes';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('codigo')
                ->label('Código')
                ->autocapitalize('words')
                ->placeholder('L00123456')
                ->length(9)
                ->required(),
                TextInput::make('cedula')
                ->label('Cédula')
                ->length(10)
                ->placeholder('0604578965')
                ->required(),
                TextInput::make('nombre')
                ->autocapitalize('words')
                ->maxLength(50)
                ->placeholder('Juan')
                ->required(),
                TextInput::make('apellido')
                ->autocapitalize('words')
                ->maxLength(50)
                ->placeholder('Perez')
                ->required(),
                FileUpload::make('foto_personal')
                ->image()
                ->imageEditor()
                ->directory('images')
                ->preserveFilenames()
                ->previewable(true),
                DatePicker::make('fecha_nacimiento')
                ->label('Fecha de nacimiento')
                ->placeholder('DD/MM/YYYY')
                ->native(false)
                ->displayFormat('d/m/Y')
                ->closeOnDateSelection()
                ->required(),
                Select::make('id_genero')
                ->label('Género')
                ->relationship('genero', 'nombre')
                ->required(),
                TextInput::make('telefono')
                ->label('Teléfono')
                ->length(10)
                ->tel()
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                ->placeholder('0987654321')
                ->required(),
                TextInput::make('email')
                ->email()
                ->maxLength(200)
                ->placeholder('email@espe.edu.ec')
                ->required(),
                TextInput::make('direccion')
                ->label('Dirección')
                ->maxLength(200)
                ->autocapitalize('words')
                ->placeholder('Calle principal y Secundaria')
                ->required(),
                TextInput::make('acercade')
                ->label('Acerca de')
                ->name('Acerca de')
                ->maxLength(200)
                ->autocapitalize('words')
                ->default('N/A'),
                TextInput::make('observaciones')
                ->maxLength(200)
                ->autocapitalize('words')
                ->default('N/A'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo')
                ->label('Código'),
                TextColumn::make('cedula')
                ->label('Cédula'),
                TextColumn::make('nombre'),
                TextColumn::make('apellido'),
                ImageColumn::make('foto_personal')
                ->circular()
                ->visibility('private')
                ->defaultImageUrl(url('/img/user.png')),
                TextColumn::make('fecha_nacimiento')
                ->label('Fecha de nacimiento')
                ->date(),
                TextColumn::make('genero.nombre')
                ->label('Género'),
                TextColumn::make('telefono')
                ->label('Teléfono'),
                TextColumn::make('email')
                ->label('Correo'),
                TextColumn::make('direccion')
                ->label('Dorección'),
                TextColumn::make('acercade')
                ->label('Acerca de'),
                TextColumn::make('observaciones'),
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
                    ->url(fn (Docente $record) => route('generateDocentesPDF', $record->id))
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
            'index' => Pages\ListDocentes::route('/'),
            'create' => Pages\CreateDocente::route('/create'),
            'edit' => Pages\EditDocente::route('/{record}/edit'),
        ];
    }
}
