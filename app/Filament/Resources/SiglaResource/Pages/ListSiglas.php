<?php

namespace App\Filament\Resources\SiglaResource\Pages;

use App\Filament\Resources\SiglaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiglas extends ListRecords
{
    protected static string $resource = SiglaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
