<?php

namespace App\Filament\Resources\PublicacioncientificaResource\Pages;

use App\Filament\Resources\PublicacioncientificaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublicacioncientifica extends EditRecord
{
    protected static string $resource = PublicacioncientificaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
