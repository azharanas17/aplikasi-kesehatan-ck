<?php

namespace App\Filament\Resources\RelawanResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\RelawanResource;

class ViewQrCode extends ViewRecord
{
    protected static string $resource = RelawanResource::class;

    protected static string $view = 'filament.resources.relawan-resource.pages.view-qr-code';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
