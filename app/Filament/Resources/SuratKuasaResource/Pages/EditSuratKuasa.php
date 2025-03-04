<?php

namespace App\Filament\Resources\SuratKuasaResource\Pages;

use App\Filament\Resources\SuratKuasaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratKuasa extends EditRecord
{
    protected static string $resource = SuratKuasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
