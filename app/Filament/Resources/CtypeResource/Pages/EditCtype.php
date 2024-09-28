<?php

namespace App\Filament\Resources\CtypeResource\Pages;

use App\Filament\Resources\CtypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCtype extends EditRecord
{
    protected static string $resource = CtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
