<?php

namespace App\Filament\Resources\GithubProfileResource\Pages;

use App\Filament\Resources\GithubProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGithubProfile extends EditRecord
{
    protected static string $resource = GithubProfileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
