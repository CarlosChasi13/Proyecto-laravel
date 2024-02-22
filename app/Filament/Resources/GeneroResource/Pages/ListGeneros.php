<?php

namespace App\Filament\Resources\GeneroResource\Pages;

use App\Filament\Resources\GeneroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneros extends ListRecords
{
    protected static string $resource = GeneroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
