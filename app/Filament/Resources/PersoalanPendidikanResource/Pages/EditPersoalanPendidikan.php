<?php

namespace App\Filament\Resources\PersoalanPendidikanResource\Pages;

use App\Filament\Resources\PersoalanPendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersoalanPendidikan extends EditRecord
{
    protected static string $resource = PersoalanPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
