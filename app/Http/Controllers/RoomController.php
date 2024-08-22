<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\roomRequest;
use App\Http\Requests\UproomRequest;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function addroom (roomRequest $request,Room $room){
        $validate=$request->validated();
        if($validate){
             $newroom = $room->create($validate);
            return response()->json(['room' => $newroom],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }



    public function updateroom(UproomRequest $request, Room $room, $id)
{
    $room = Room::with('Sport')->find($id);
    if (!$room) {
        return response()->json(['error' => 'Room not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $room->update($validatedData);
        return response()->json(['room' => $room], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
}

     public function showroom($id){

        $room = Room::with('Sport')->find($id);

        if (!$room) return response()->json(['error' => 'room not found'],404);
        else{
            return response()->json(['room' => $room],200);
        }
    }

    public function Allrooms(){
        $rooms=Room::with('Sport')->get();
        return response()->json(['rooms' => $rooms],200);
    }

    public function delelteroom($id){
        $room=Room::find($id);
        if (!$room) return response()->json(['error' => 'room not found'],404);
        else{
            $room->delete();
            return response()->json(['message' => 'Sport deleted successfully'],200);
        }
    }
}

