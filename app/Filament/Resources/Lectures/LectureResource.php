<?php

namespace App\Filament\Resources\Lectures;

use App\Filament\Resources\Lectures\Pages\CreateLecture;
use App\Filament\Resources\Lectures\Pages\EditLecture;
use App\Filament\Resources\Lectures\Pages\ListLectures;
use App\Filament\Resources\Lectures\Pages\ViewLecture;
use App\Filament\Resources\Lectures\Schemas\LectureInfolist;
use App\Models\Lecture;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class LectureResource extends Resource
{
    protected static ?string $model = Lecture::class;

    protected static ?string $recordTitleAttribute = 'nama';

    // =========================
    // NAVIGATION
    // =========================
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-academic-cap';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen SDM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Dosen';
    }

    public static function getModelLabel(): string
    {
        return 'Dosen';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Dosen';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Dr. Ahmad Sutarno, M.Kom.'),

                TextInput::make('nidn')
                    ->label('NIDN')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: 0123456789')
                    ->helperText('Nomor Induk Dosen Nasional (10 digit).'),

                TextInput::make('pendidikan')
                    ->label('Riwayat Pendidikan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: S3 Teknik Informatika — Universitas Indonesia'),

                TextInput::make('jabatan')
                    ->label('Jabatan Fungsional')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Lektor Kepala'),

                TextInput::make('email')
                    ->label('Email Dosen')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: ahmad@b-university.ac.id')
                    ->helperText('Email aktif untuk komunikasi resmi.'),

                TextInput::make('topik')
                    ->label('Topik / Bidang Keahlian')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Machine Learning, Data Mining'),

                FileUpload::make('image')
                    ->label('Foto Dosen')
                    ->image()
                    ->disk('public')
                    ->directory('lectures')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Upload foto formal dosen. Format: JPG, PNG. Maks 2MB.')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return LectureInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->height(60)
                    ->circular(),

                TextColumn::make('nama')
                    ->label('Nama Dosen')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('nidn')
                    ->label('NIDN')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('NIDN disalin!')
                    ->toggleable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email disalin!')
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('topik')
                    ->label('Bidang Keahlian')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn (?string $state): ?string => $state)
                    ->toggleable(),

                TextColumn::make('pendidikan')
                    ->label('Pendidikan')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn (?string $state): ?string => $state)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama', 'asc');
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
            'index' => ListLectures::route('/'),
            'create' => CreateLecture::route('/create'),
            'view' => ViewLecture::route('/{record}'),
            'edit' => EditLecture::route('/{record}/edit'),
        ];
    }
}