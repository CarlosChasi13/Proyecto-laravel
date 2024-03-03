<?php

namespace App\Filament\Resources\DocemateriaResource\Pages;

use App\Filament\Resources\DocemateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocemateria extends EditRecord
{
    protected static string $resource = DocemateriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
