<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\Pages\CreateNews;
use App\Filament\Resources\News\Pages\EditNews;
use App\Filament\Resources\News\Pages\ListNews;
use App\Filament\Resources\News\Pages\ViewNews;
use App\Filament\Resources\News\Schemas\NewsForm;
use App\Filament\Resources\News\Schemas\NewsInfolist;
use App\Filament\Resources\News\Tables\NewsTable;
use App\Models\News;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-newspaper';
    }

    public static function getNavigationLabel(): string
    {
        return 'Berita';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Publikasi';
    }

    public static function getModelLabel(): string
    {
        return 'Berita';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Berita';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Schema $schema): Schema
    {
        return NewsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NewsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListNews::route('/'),
            'create' => CreateNews::route('/create'),
            'view'   => ViewNews::route('/{record}'),
            'edit'   => EditNews::route('/{record}/edit'),
        ];
    }
}