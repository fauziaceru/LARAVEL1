<?php

namespace App\Filament\Resources\Kategoris\Tables;

use App\Models\Kategori; 
use Filament\Notifications\Notification; 
use Filament\Actions\DeleteAction; 
use Filament\Actions\EditAction; 
use Filament\Tables\Columns\TextColumn; 
use Filament\Tables\Filters\SelectFilter; 
use Filament\Tables\Table;

class KategorisTable
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

                TextColumn::make('jenis')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string =>
                        $state === 'Pemasukan' ? 'success' : 'danger'
                    ),

                TextColumn::make('transaksi_count')
                    ->label('Jumlah transaksi')
                    ->counts('transaksi')
                    ->sortable(),
                
                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),                    
            ])
            ->defaultSort('nama')
            ->filters([
                SelectFilter::make('jenis')
                    ->options([
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->before(function (DeleteAction $action, Kategori $record): void {
                        if ($record->transaksi()->exists()) {
                            Notification::make()
                                ->danger()
                                ->title('Kategori tidak dapat dihapus')
                                ->body('Kategori ini masih digunakan oleh transaksi.')
                                ->send();

                            $action->cancel();
                        }
                    }),
            ])
            ->toolbarActions([]);
    }
}