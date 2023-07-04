<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\SoldTicketResource\Pages;
use App\Filament\Resources\SoldTicketResource\RelationManagers;
use App\Models\SoldTicket;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SoldTicketResource extends Resource
{
    protected static ?string $label = "Ticket code";

    protected static ?string $model = SoldTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ticket_id')
                    ->relationship('ticket', 'name'),
                Forms\Components\TextInput::make('quantity')
                    ->integer(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ticket.name'),
                Tables\Columns\TextColumn::make('code'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('Export'),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('Export'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoldTickets::route('/'),
            'create' => Pages\CreateSoldTicket::route('/create'),
            // 'edit' => Pages\EditSoldTicket::route('/{record}/edit'),
        ];
    }
}
