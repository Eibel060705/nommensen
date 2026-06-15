<?php

namespace App\Filament\Resources\Histories;

use App\Filament\Resources\Histories\Pages\CreateHistory;
use App\Filament\Resources\Histories\Pages\EditHistory;
use App\Filament\Resources\Histories\Pages\ListHistories;
use App\Filament\Resources\Histories\Pages\ViewHistory;
use App\Filament\Resources\Histories\Schemas\HistoryForm;
use App\Filament\Resources\Histories\Schemas\HistoryInfolist;
use App\Filament\Resources\Histories\Tables\HistoriesTable;
use App\Models\History;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class HistoryResource extends Resource
{
    protected static ?string $model = History::class;

    // =========================
    // NAVIGATION
    // =========================
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-clock';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Profil Universitas';
    }

    public static function getNavigationLabel(): string
    {
        return 'Sejarah';
    }

    public static function getModelLabel(): string
    {
        return 'Sejarah';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Sejarah';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    protected static ?string $recordTitleAttribute = 'content';

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return HistoryForm::configure($schema);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return HistoryInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return HistoriesTable::configure($table);
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
            'index' => ListHistories::route('/'),
            'create' => CreateHistory::route('/create'),
            'view' => ViewHistory::route('/{record}'),
            'edit' => EditHistory::route('/{record}/edit'),
        ];
    }
}