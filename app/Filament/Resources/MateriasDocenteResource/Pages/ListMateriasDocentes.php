<?php

namespace App\Filament\Resources\MateriasDocenteResource\Pages;

use App\Filament\Resources\MateriasDocenteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMateriasDocentes extends ListRecords
{
    protected static string $resource = MateriasDocenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
