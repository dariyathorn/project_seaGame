<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        "seat",
        "price",
        "event_id",
        "buy_ticket"
    ];

    public static function store($request, $id = null)
    {
        $ticket = $request->only([
            "seat",
            "price",
            "event_id",
            "buy_ticket"
        ]);
        if ($id) {
            $dataTicket = self::updateOrCreate(["id" => $id], $ticket);
        } else {
            $dataTicket = self::create($ticket);
            $id = $dataTicket->id;
        }
        return $dataTicket;
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'buy_ticket');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
