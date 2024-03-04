<?php

namespace App\Filament\Resources\MateriasDocenteResource\Pages;

use App\Filament\Resources\MateriasDocenteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMateriasDocente extends EditRecord
{
    protected static string $resource = MateriasDocenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
