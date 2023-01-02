<?php

namespace App\Filament\Resources\GithubProfileResource\Pages;

use App\Filament\Resources\GithubProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGithubProfiles extends ListRecords
{
    protected static string $resource = GithubProfileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
