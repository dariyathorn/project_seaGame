<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
        // dd(88);
       $user = User::all();
       $user = UserResource::collection($user);
        return response()->json(['success'=>true, 'data' =>$user], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::store($request);
        return response()->json(['success'=>true, 'data' => $user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd(88);

        $user = User::find($id);
        $user = new ShowUserResource($user);
        return response()->json(['success'=>true, 'data' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd(88);

        $user = User::store($request, $id);
        return response()->json(['success'=>true, 'data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd(88);

        $user = User::find($id);
        $user ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);

    }
}
