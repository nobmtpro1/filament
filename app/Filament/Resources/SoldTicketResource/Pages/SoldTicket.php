<?php

namespace App\Filament\Resources\SoldTicketResource\Pages;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\SoldTicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Table;
use Filament\Tables;

class SoldTicket extends ListRecords
{
    protected static string $resource = SoldTicketResource::class;

    protected function getActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        return static::getResource()::getEloquentQuery()->whereNotNull('confirm_at');
    }

    protected function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ticket.name'),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('device'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('Export'),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('Export'),
            ]);
    }
}
