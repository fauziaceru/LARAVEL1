<?php

namespace App\Filament\Resources\Akuns\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class AkunForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->label('Kode')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true),

                TextInput::make('nama')
                    ->label('Nama akun')
                    ->required()
                    ->maxLength(100),

                TextInput::make('saldo_awal')
                    ->label('Saldo awal')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('Rp'),
            ]);
    }
}