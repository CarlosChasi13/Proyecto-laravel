<?php

namespace App\Filament\Resources\ExperiencialaboralResource\Pages;

use App\Filament\Resources\ExperiencialaboralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExperiencialaboral extends EditRecord
{
    protected static string $resource = ExperiencialaboralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
