<?php

namespace App\Filament\Resources\PersoalanPendidikanResource\Pages;

use App\Filament\Resources\PersoalanPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersoalanPendidikans extends ListRecords
{
    protected static string $resource = PersoalanPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
