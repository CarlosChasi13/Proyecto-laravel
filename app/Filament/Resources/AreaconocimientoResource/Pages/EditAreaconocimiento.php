<?php

namespace App\Filament\Resources\AreaconocimientoResource\Pages;

use App\Filament\Resources\AreaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAreaconocimiento extends EditRecord
{
    protected static string $resource = AreaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
