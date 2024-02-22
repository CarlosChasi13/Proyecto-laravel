<?php

namespace App\Filament\Resources\DocenteResource\Pages;

use App\Filament\Resources\DocenteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocente extends EditRecord
{
    protected static string $resource = DocenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
