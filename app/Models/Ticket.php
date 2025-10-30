<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Event;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'ticket_type',
        'price',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
