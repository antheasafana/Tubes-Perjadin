<?php

namespace App\Filament\Resources\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_admin')
                    ->label('Nama Admin')
                    ->required(),

                Textarea::make('nip_admin')
                    ->label('NIP Admin')
                    ->maxLength(500)
                    ->required(),

                Select::make('posisi_admin')
                    ->label('Posisi Admin')
                    ->options([
                        'Manajer' => 'Manajer',
                        'Staff' => 'Staff',
                    ])
                    ->required(),

                DatePicker::make('tanggal_lahir_admin')
                    ->label('Tanggal Lahir Admin')
                    ->required(),


                FileUpload::make('dokumen_admin')
                    ->label('Foto Profil Admin')
                    ->directory('documents')
                    ->columnSpan(2)
                    ->required(),

                Toggle::make('is_admin')
                    ->label('Admin?')
                    ->inline(false)
                    ->columnSpan(2)
                    ->required(),

            ]);
    }
}
