<?php

namespace App\Filament\Resources\TempatPendampinganResource\Pages;

use App\Filament\Resources\TempatPendampinganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTempatPendampingans extends ListRecords
{
    protected static string $resource = TempatPendampinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
