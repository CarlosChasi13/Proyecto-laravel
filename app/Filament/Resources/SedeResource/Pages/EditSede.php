<?php

namespace App\Filament\Resources\SedeResource\Pages;

use App\Filament\Resources\SedeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSede extends EditRecord
{
    protected static string $resource = SedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
