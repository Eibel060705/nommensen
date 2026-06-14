<?php

namespace App\Filament\Resources\Footers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Logo Universitas')
                    ->image()
                    ->disk('public')
                    ->directory('footers')
                    ->visibility('public')
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat Lengkap')
                    ->required(),

                TextInput::make('link_gmaps')
                    ->label('Link Google Maps')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('wa')
                    ->label('WhatsApp')
                    ->required(),

                TextInput::make('link_instagram')
                    ->label('Instagram')
                    ->required(),

                TextInput::make('link_youtube')
                    ->label('YouTube')
                    ->required(),

                TextInput::make('link_linkedin')
                    ->label('LinkedIn')
                    ->required(),

                TextInput::make('link_facebook')
                    ->label('Facebook')
                    ->required(),
            ]);
    }
}