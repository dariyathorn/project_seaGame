<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'create_by_id',
        'member',
        'user_id'
    ];

    
    public static function store($request, $id = null){
        $team = $request->only(
            'name',
            'create_by_id',
            'member',
            'user_id'
        );
        if($id){
            $team = self::updateOrCreate(['id'=>$id], $team);

        }
        else{
            $team = self::create($team);
            $id = $team->id;
        }
        return $team;
    //    $team = self::updateOrCreate(['user_id'=>$id], $team);
    //    return $team;
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function events()
    // {
    //     // return $this->belongsToMany(Event::class)->using(TeamEvent::class)->withPivot('price');
    //     return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
         
    }
    
};

