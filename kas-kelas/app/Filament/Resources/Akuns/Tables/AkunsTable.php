<?php

namespace App\Filament\Resources\Akuns\Tables;

use App\Models\Akun;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

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
                Filter::make('saldo_di_atas_1_juta')
                    ->label('Saldo awal di atas Rp1.000.000')
                    ->query(fn (Builder $query): Builder => $query->where('saldo_awal', '>', 1000000)),
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