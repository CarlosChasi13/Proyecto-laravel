<?php

namespace App\Filament\Resources\NrcResource\Pages;

use App\Filament\Resources\NrcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNrcs extends ListRecords
{
    protected static string $resource = NrcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
