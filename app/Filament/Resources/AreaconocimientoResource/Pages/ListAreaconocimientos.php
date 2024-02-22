<?php

namespace App\Filament\Resources\AreaconocimientoResource\Pages;

use App\Filament\Resources\AreaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAreaconocimientos extends ListRecords
{
    protected static string $resource = AreaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
