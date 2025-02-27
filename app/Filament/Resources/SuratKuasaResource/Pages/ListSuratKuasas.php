<?php

namespace App\Filament\Resources\SuratKuasaResource\Pages;

use App\Filament\Resources\SuratKuasaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKuasas extends ListRecords
{
    protected static string $resource = SuratKuasaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
