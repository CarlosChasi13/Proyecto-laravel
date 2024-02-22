<?php

namespace App\Filament\Resources\TituloResource\Pages;

use App\Filament\Resources\TituloResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTitulos extends ListRecords
{
    protected static string $resource = TituloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
