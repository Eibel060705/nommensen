<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\Pages\CreateStudent;
use App\Filament\Resources\Students\Pages\EditStudent;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Pages\ViewStudent;
use App\Filament\Resources\Students\Schemas\StudentForm;
use App\Filament\Resources\Students\Schemas\StudentInfolist;
use App\Filament\Resources\Students\Tables\StudentsTable;
use App\Models\Student;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    // ✅ NAVIGATION (pakai method biar tidak merah)
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen SDM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Mahasiswa';
    }

    public static function getModelLabel(): string
    {
        return 'Mahasiswa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Mahasiswa';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    protected static ?string $recordTitleAttribute = 'Student';

    // =========================
    // FORM
    // =========================
    public static function form(Schema $schema): Schema
    {
        return StudentForm::configure($schema);
    }

    // =========================
    // INFOLIST
    // =========================
    public static function infolist(Schema $schema): Schema
    {
        return StudentInfolist::configure($schema);
    }

    // =========================
    // TABLE
    // =========================
    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
    }

    // =========================
    // RELATION
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
            'index' => ListStudents::route('/'),
            'create' => CreateStudent::route('/create'),
            'view' => ViewStudent::route('/{record}'),
            'edit' => EditStudent::route('/{record}/edit'),
        ];
    }
}