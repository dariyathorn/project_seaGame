<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use GuzzleHttp\Psr7\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json(['success'=>true, 'data'=>$events], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function  Store(EventStoreRequest $request)
    {
        $event = Event::store($request);
        return response()->json(['success'=>true, 'data' => $event], 200);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);
        $events = new ShowEventResource($events);
        return response()->json(['success'=>true, 'data' => $events], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventStoreRequest $request, string $id)
    {
        $event = Event::store($request);
        return response()->json(['success'=>true, 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
    }

//search event
    public function searchEvent($name)
    {
        $event = Event::where("name",'like','%' .$name .'%')->get();
        return $event;
    }
}
