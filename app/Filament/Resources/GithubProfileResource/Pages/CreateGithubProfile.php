<?php

namespace App\Filament\Resources\GithubProfileResource\Pages;

use App\Filament\Resources\GithubProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGithubProfile extends CreateRecord
{
    protected static string $resource = GithubProfileResource::class;
}
