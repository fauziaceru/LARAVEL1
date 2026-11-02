<?php

namespace App\Filament\Resources\Akuns\Tables;

use App\Models\Akun;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AkunsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('saldo_awal')
                    ->label('Saldo awal')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                TextColumn::make('transaksi_count')
                    ->label('Jumlah transaksi')
                    ->counts('transaksi'),
            ])
            ->defaultSort('nama')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                DeleteAction::make()
                    ->before(function (DeleteAction $action, Akun $record): void {
                        if ($record->transaksi()->exists()) {
                            Notification::make()
                                ->danger()
                                ->title('Akun tidak dapat dihapus')
                                ->body('Akun ini masih digunakan oleh transaksi.')
                                ->send();

                            $action->cancel();
                        }
                    }),
            ])
            ->toolbarActions([]);
    }
}