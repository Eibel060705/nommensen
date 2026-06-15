<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->height(60)
                    ->circular(),

                TextColumn::make('namalengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('namapanggilan')
                    ->label('Panggilan')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email disalin!')
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('nomor_hp')
                    ->label('No. HP')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nomor HP disalin!')
                    ->icon('heroicon-o-phone'),

                TextColumn::make('jalur')
                    ->label('Jalur Masuk')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Reguler'  => 'info',
                        'Beasiswa' => 'success',
                        'Transfer' => 'warning',
                        default    => 'gray',
                    }),

                TextColumn::make('programstudi_1')
                    ->label('Prodi Pilihan 1')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('programstudi_2')
                    ->label('Prodi Pilihan 2')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Didaftarkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}