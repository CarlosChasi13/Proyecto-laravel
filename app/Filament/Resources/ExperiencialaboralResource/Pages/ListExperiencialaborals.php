<?php

namespace App\Filament\Resources\ExperiencialaboralResource\Pages;

use App\Filament\Resources\ExperiencialaboralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExperiencialaborals extends ListRecords
{
    protected static string $resource = ExperiencialaboralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
