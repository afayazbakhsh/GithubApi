<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GithubProfileResource\Pages;
use App\Filament\Resources\GithubProfileResource\RelationManagers;
use App\Models\GithubProfile;
use Filament\Forms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GithubProfileResource extends Resource
{
    protected static ?string $model = GithubProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('username')->required(),
                Forms\Components\TextInput::make('email')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')->square(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('username'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('followers_count'),
                Tables\Columns\TextColumn::make('following_count'),
                Tables\Columns\TextColumn::make('public_repos_count'),
                Tables\Columns\TextColumn::make('link'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGithubProfiles::route('/'),
            'create' => Pages\CreateGithubProfile::route('/create'),
            'edit' => Pages\EditGithubProfile::route('/{record}/edit'),
        ];
    }
}
