<?php

namespace App\Filament\Resources\Footers;

use App\Filament\Resources\Footers\Pages\CreateFooter;
use App\Filament\Resources\Footers\Pages\EditFooter;
use App\Filament\Resources\Footers\Pages\ListFooters;
use App\Filament\Resources\Footers\Pages\ViewFooter;
use App\Filament\Resources\Footers\Schemas\FooterForm;
use App\Filament\Resources\Footers\Schemas\FooterInfolist;
use App\Filament\Resources\Footers\Tables\FootersTable;
use App\Models\Footer;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class FooterResource extends Resource
{
    protected static ?string $model = Footer::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-cog-6-tooth';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Pengaturan';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengaturan Footer';
    }

    public static function getModelLabel(): string
    {
        return 'Footer';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pengaturan Footer';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    protected static ?string $recordTitleAttribute = 'Footer';

    public static function form(Schema $schema): Schema
    {
        return FooterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FooterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FootersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFooters::route('/'),
            'create' => CreateFooter::route('/create'),
            'view' => ViewFooter::route('/{record}'),
            'edit' => EditFooter::route('/{record}/edit'),
        ];
    }
}