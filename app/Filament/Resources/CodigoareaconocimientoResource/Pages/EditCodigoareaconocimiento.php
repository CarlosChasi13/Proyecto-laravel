<?php

namespace App\Filament\Resources\CodigoareaconocimientoResource\Pages;

use App\Filament\Resources\CodigoareaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodigoareaconocimiento extends EditRecord
{
    protected static string $resource = CodigoareaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
