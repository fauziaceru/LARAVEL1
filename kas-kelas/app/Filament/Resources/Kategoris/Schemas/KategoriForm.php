<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->label('Kode')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->placeholder('Contoh: IURAN'),
                TextInput::make('nama')
                    ->label('Nama kategori')
                    ->required()
                    ->maxLength(100),
                Select::make('jenis')
                    ->label('Jenis')
                    ->options([
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ])
                    ->required(),
            ]);
    }
}