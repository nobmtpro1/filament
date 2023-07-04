<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'image', 'name', 'date', 'from', 'to', 'quantity', 'address', 'price', 'link_video', 'examiner_type', 'examiner', 'overview', 'is_active'];
    protected $casts = [
        'examiner' => 'json'
    ];

    public static $type_options = [
        0 => "Online",
        1 => "Offline"
    ];

    public static $is_active_options = [
        0 => "Disable",
        1 => "Active"
    ];

    public function soldTicket()
    {
        return $this->hasMany(SoldTicket::class, 'ticket_id');
    }
}
