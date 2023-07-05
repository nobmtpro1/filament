<?php

namespace App\Filament\Resources\SoldTicketResource\Pages;

use App\Filament\Resources\SoldTicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;

class ListSoldTickets extends ListRecords
{
    protected static string $resource = SoldTicketResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('Sold Ticket')
                ->label('Sold Ticket')
                ->url(SoldTicketResource::getUrl('sold')),
            Actions\CreateAction::make(),
        ];
    }
}
