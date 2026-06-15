<?php

namespace App\Filament\Resources\Aboutmes;

use App\Filament\Resources\Aboutmes\Pages\CreateAboutme;
use App\Filament\Resources\Aboutmes\Pages\EditAboutme;
use App\Filament\Resources\Aboutmes\Pages\ListAboutmes;
use App\Filament\Resources\Aboutmes\Pages\ViewAboutme;
use App\Filament\Resources\Aboutmes\Schemas\AboutmeForm;
use App\Filament\Resources\Aboutmes\Schemas\AboutmeInfolist;
use App\Filament\Resources\Aboutmes\Tables\AboutmesTable;
use App\Models\Aboutme;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutmeResource extends Resource
{
    protected static ?string $model = Aboutme::class;

    protected static ?string $recordTitleAttribute = 'content';

    // =========================
    // NAVIGATION
    // =========================
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-information-circle';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Profil Universitas';
    }

    public static function getNavigationLabel(): string
    {
        return 'Profil Universitas';
    }

    public static function getModelLabel(): string
    {
        return 'Profil';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Profil Universitas';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return AboutmeForm::configure($schema);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return AboutmeInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return AboutmesTable::configure($table);
    }

    // =========================
    // RELATIONS
    // =========================
    public static function getRelations(): array
    {
        return [];
    }

    // =========================
    // PAGES
    // =========================
    public static function getPages(): array
    {
        return [
            'index' => ListAboutmes::route('/'),
            'create' => CreateAboutme::route('/create'),
            'view' => ViewAboutme::route('/{record}'),
            'edit' => EditAboutme::route('/{record}/edit'),
        ];
    }
}