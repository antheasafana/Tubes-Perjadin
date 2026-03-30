<?php

namespace App\Filament\Resources\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_admin')
                ->label('Nama Admin')
                ->searchable()
                ->sortable(),

                TextColumn::make('nip_admin')
                    ->label('NIP_admin')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('posisi_admin')
                    ->label('Posisi Admin')
                    ->colors([
                        'Manajer' => 'Manajer',
                        'Staff' => 'Staff',
                    ]),

                TextColumn::make('tanggal_lahir_admin')
                    ->label('Tanggal Lahir Admin')
                    ->sortable(),

                
                TextColumn::make('dokumen_admin')
                    ->label('Dokumen Admin')
                    ->url(fn($record) => asset('storage/' . $record->file_path), true)
                    ->formatStateUsing(fn($state) => $state 
                        ? '<a href="' . asset('storage/' . $state) . '" target="_blank"><i class="fas fa-file-pdf"></i> 📄 </a>' 
                        : 'Tidak Ada File')
                    ->html(), // Pastikan menggunakan html() agar bisa merender HTML
                    // Buka file saat diklik

                IconColumn::make('is_admin')
                    ->label('Admin?')
                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
