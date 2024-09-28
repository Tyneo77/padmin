<?php

namespace App\Filament\Resources\InfopixelResource\Pages;

use App\Filament\Resources\InfopixelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfopixel extends EditRecord
{
    protected static string $resource = InfopixelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
