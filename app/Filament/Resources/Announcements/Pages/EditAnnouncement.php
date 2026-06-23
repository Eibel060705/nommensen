<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    /**
     * Regenerasi slug saat judul diubah.
     * Hapus method ini jika ingin slug tetap sama.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (! empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . time();
        }

        return $data;
    }
}