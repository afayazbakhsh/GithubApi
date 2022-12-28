<?php

namespace App\Filament\Resources\TokenResource\Pages;

use App\Filament\Resources\TokenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewToken extends ViewRecord
{
    protected static string $resource = TokenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
