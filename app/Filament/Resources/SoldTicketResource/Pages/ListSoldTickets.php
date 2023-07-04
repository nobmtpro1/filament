<?php

namespace App\Filament\Resources\SoldTicketResource\Pages;

use App\Filament\Resources\SoldTicketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoldTickets extends ListRecords
{
    protected static string $resource = SoldTicketResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
