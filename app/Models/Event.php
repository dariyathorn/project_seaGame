<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'location',
        'user_id'
    ];
    public static function store($request, $id = null){
        $event = $request->only(
            'name',
            'start_date',
            'end_date',
            'location',
            'user_id'
        );
        if($id){
            $event = self::updateOrCreate(['id'=>$id], $event);

        }
        else{
            $event = self::create($event);
            $id = $event->id;
        }
        return $event;
    }
    public function users():BelongsToMany{
        return $this->belongsToMany(User::class);
    }
}
