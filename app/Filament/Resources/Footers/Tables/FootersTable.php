<?php

namespace App\Filament\Resources\Footers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Logo')
                    ->disk('public')
                    ->height(50),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50)
                    ->tooltip(fn (?string $state): ?string => $state)
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email disalin!')
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('wa')
                    ->label('WhatsApp')
                    ->copyable()
                    ->copyMessage('Nomor WA disalin!')
                    ->icon('heroicon-o-chat-bubble-left-right'),

                TextColumn::make('link_instagram')
                    ->label('Instagram')
                    ->url(fn ($record) => $record->link_instagram, true)
                    ->icon('heroicon-o-link')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Buka' : '-')
                    ->color('info'),

                TextColumn::make('link_youtube')
                    ->label('YouTube')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('link_linkedin')
                    ->label('LinkedIn')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('link_facebook')
                    ->label('Facebook')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('link_gmaps')
                    ->label('Google Maps')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}