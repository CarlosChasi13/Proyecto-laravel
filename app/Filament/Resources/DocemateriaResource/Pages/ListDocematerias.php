<?php

namespace App\Filament\Resources\DocemateriaResource\Pages;

use App\Filament\Resources\DocemateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocematerias extends ListRecords
{
    protected static string $resource = DocemateriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
