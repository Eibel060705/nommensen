<?php

namespace App\Filament\Resources\Books\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->label('Sampul')
                    ->disk('public')
                    ->height(60),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),

                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                TextColumn::make('publication_year')
                    ->label('Tahun')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('stock')
                    ->label('Stok')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => $state > 0 ? 'success' : 'danger')
                    ->icon(fn (int $state): string => $state > 0 ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'Teknologi' => 'Teknologi',
                        'Pemrograman' => 'Pemrograman',
                        'Basis Data' => 'Basis Data',
                        'Jaringan' => 'Jaringan',
                        'Lainnya' => 'Lainnya',
                    ]),

                Filter::make('stock')
                    ->label('Stok Tersedia')
                    ->query(fn ($query) => $query->where('stock', '>', 0)),

                Filter::make('stock_zero')
                    ->label('Stok Habis')
                    ->query(fn ($query) => $query->where('stock', '=', 0)),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->color('warning'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50, 100])
            ->striped();
    }
}
