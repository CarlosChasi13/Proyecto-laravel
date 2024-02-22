<?php

namespace App\Filament\Resources\CodigoareaconocimientoResource\Pages;

use App\Filament\Resources\CodigoareaconocimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCodigoareaconocimientos extends ListRecords
{
    protected static string $resource = CodigoareaconocimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
