<?php

namespace App\Filament\Resources\DocenteareaconocimientoResource\Pages;

use App\Filament\Resources\DocenteareaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocenteareaconocimiento extends EditRecord
{
    protected static string $resource = DocenteareaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
