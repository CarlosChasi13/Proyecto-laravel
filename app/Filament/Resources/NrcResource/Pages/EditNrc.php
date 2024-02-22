<?php

namespace App\Filament\Resources\NrcResource\Pages;

use App\Filament\Resources\NrcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNrc extends EditRecord
{
    protected static string $resource = NrcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
