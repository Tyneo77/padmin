<?php

namespace App\Filament\Resources\InfopixelResource\Pages;

use App\Filament\Resources\InfopixelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfopixels extends ListRecords
{
    protected static string $resource = InfopixelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
