<?php

namespace App\Http\Controllers;

use App\Models\EventTeam;
use Illuminate\Http\Request;

class EventTeamController extends Controller
{
    public function event_teams(){
        $event_team = EventTeam::create([
            'team_id'=>request('team_id'),
            'event_id'=>request('event_id'),
        ]);
        return response()->json(['success'=>true, 'data' => $event_team], 200);
        
    }
}