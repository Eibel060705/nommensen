<?php

namespace App\Filament\Resources\Visimisis;

use App\Filament\Resources\Visimisis\Pages\CreateVisimisi;
use App\Filament\Resources\Visimisis\Pages\EditVisimisi;
use App\Filament\Resources\Visimisis\Pages\ListVisimisis;
use App\Filament\Resources\Visimisis\Pages\ViewVisimisi;
use App\Filament\Resources\Visimisis\Schemas\VisimisiForm;
use App\Filament\Resources\Visimisis\Schemas\VisimisiInfolist;
use App\Filament\Resources\Visimisis\Tables\VisimisisTable;
use App\Models\Visimisi;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class VisimisiResource extends Resource
{
    protected static ?string $model = Visimisi::class;

    // =========================
    // NAVIGATION
    // =========================
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-eye';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Profil Universitas';
    }

    public static function getNavigationLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function getModelLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    protected static ?string $recordTitleAttribute = 'visi';

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return VisimisiForm::configure($schema);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return VisimisiInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return VisimisisTable::configure($table);
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
            'index' => ListVisimisis::route('/'),
            'create' => CreateVisimisi::route('/create'),
            'view' => ViewVisimisi::route('/{record}'),
            'edit' => EditVisimisi::route('/{record}/edit'),
        ];
    }
}