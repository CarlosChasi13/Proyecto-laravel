<?php

namespace App\Filament\Resources\SiglaResource\Pages;

use App\Filament\Resources\SiglaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSigla extends EditRecord
{
    protected static string $resource = SiglaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
