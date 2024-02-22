<?php

namespace App\Filament\Resources\PeriodoacademicoResource\Pages;

use App\Filament\Resources\PeriodoacademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodoacademico extends EditRecord
{
    protected static string $resource = PeriodoacademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
