<?php

namespace App\Filament\Resources\PeriodoacademicoResource\Pages;

use App\Filament\Resources\PeriodoacademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodoacademicos extends ListRecords
{
    protected static string $resource = PeriodoacademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
