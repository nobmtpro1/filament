<?php

namespace App\Filament\Resources\SoldTicketResource\Pages;

use App\Filament\Resources\SoldTicketResource;
use App\Models\SoldTicket;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSoldTicket extends CreateRecord
{
    protected static string $resource = SoldTicketResource::class;

    public function create(bool $another = false): void
    {
        for ($i = 0; $i < $this->data["quantity"]; $i++) {
            $str = $this->getUniqueStr($this->generateRandomString());
            $soldTicket = new SoldTicket();
            $soldTicket->ticket_id = $this->data["ticket_id"];
            $soldTicket->code = $str;
            $soldTicket->is_generate = 1;
            $soldTicket->save();
        }

        Notification::make()
            ->success()
            ->title("Successfully")
            ->send();
        $this->redirect($this->getRedirectUrl());
    }

    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function getUniqueStr($str)
    {
        $check = SoldTicket::where('code', $str)->first();
        if ($check) {
            return $this->getUniqueStr($this->generateRandomString());
        } else {
            return $str;
        }
    }
}
