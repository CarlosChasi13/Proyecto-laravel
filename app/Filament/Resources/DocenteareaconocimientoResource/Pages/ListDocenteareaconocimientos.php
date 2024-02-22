<?php

namespace App\Filament\Resources\DocenteareaconocimientoResource\Pages;

use App\Filament\Resources\DocenteareaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocenteareaconocimientos extends ListRecords
{
    protected static string $resource = DocenteareaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
