<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Buku')
                    ->description('Masukkan data buku dengan lengkap')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Buku')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan judul buku')
                            ->columnSpanFull(),

                        TextInput::make('author')
                            ->label('Penulis')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan nama penulis'),

                        TextInput::make('category')
                            ->label('Kategori')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan kategori buku'),

                        TextInput::make('publication_year')
                            ->label('Tahun Terbit')
                            ->required()
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue((int) date('Y'))
                            ->placeholder('Contoh: 2024')
                            ->rules(['integer', 'min:1900', 'max:' . date('Y')]),

                        TextInput::make('stock')
                            ->label('Stok Buku')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder('Masukkan jumlah stok')
                            ->rules(['integer', 'min:0']),

                        FileUpload::make('cover')
                            ->label('Sampul Buku')
                            ->image()
                            ->imageEditor()
                            ->directory('covers')
                            ->disk('public')
                            ->visibility('public')
                            ->nullable()
                            ->helperText('Upload gambar sampul buku (opsional)')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
