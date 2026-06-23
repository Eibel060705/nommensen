<?php

namespace App\Filament\Resources\Announcements;

use App\Filament\Resources\Announcements\Pages\CreateAnnouncement;
use App\Filament\Resources\Announcements\Pages\EditAnnouncement;
use App\Filament\Resources\Announcements\Pages\ListAnnouncements;
use App\Filament\Resources\Announcements\Pages\ViewAnnouncement;
use App\Filament\Resources\Announcements\Schemas\AnnouncementForm;
use App\Filament\Resources\Announcements\Schemas\AnnouncementInfolist;
use App\Filament\Resources\Announcements\Tables\AnnouncementsTable;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-megaphone';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Publikasi';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengumuman';
    }

    public static function getModelLabel(): string
    {
        return 'Pengumuman';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pengumuman';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AnnouncementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AnnouncementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnnouncementsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAnnouncements::route('/'),
            'create' => CreateAnnouncement::route('/create'),
            'view' => ViewAnnouncement::route('/{record}'),
            'edit' => EditAnnouncement::route('/{record}/edit'),
        ];
    }
}