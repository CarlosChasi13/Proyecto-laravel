<?php

namespace App\Filament\Resources\AreainteresResource\Pages;

use App\Filament\Resources\AreainteresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAreainteres extends ListRecords
{
    protected static string $resource = AreainteresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
