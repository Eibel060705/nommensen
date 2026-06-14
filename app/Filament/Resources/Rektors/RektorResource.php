<?php

namespace App\Filament\Resources\Rektors;

use App\Filament\Resources\Rektors\Pages\CreateRektor;
use App\Filament\Resources\Rektors\Pages\EditRektor;
use App\Filament\Resources\Rektors\Pages\ListRektors;
use App\Filament\Resources\Rektors\Pages\ViewRektor;
use App\Filament\Resources\Rektors\Schemas\RektorForm;
use App\Filament\Resources\Rektors\Schemas\RektorInfolist;
use App\Filament\Resources\Rektors\Tables\RektorsTable;
use App\Models\Rektor;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class RektorResource extends Resource
{
    protected static ?string $model = Rektor::class;

    protected static ?string $recordTitleAttribute = 'nama';

    // =========================
    // NAVIGATION
    // =========================
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-star';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen SDM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pimpinan';
    }

    public static function getModelLabel(): string
    {
        return 'Pimpinan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pimpinan';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return RektorForm::configure($schema);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return RektorInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return RektorsTable::configure($table);
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
            'index' => ListRektors::route('/'),
            'create' => CreateRektor::route('/create'),
            'view' => ViewRektor::route('/{record}'),
            'edit' => EditRektor::route('/{record}/edit'),
        ];
    }
}