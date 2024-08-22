<?php

namespace App\Http\Controllers;

use App\Http\Requests\participantRequest;
use App\Http\Requests\upparticipantRequest;
use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function participants(participantRequest $request,Participants $participants){
        $validate=$request->validated();
        if($validate){
             $newparticipant = $participants->create($validate);
            return response()->json(['participant' => $newparticipant],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }
     public function updateparticipants(upparticipantRequest $request, Participants $participant, $id)
    {
    $participant = Participants::find($id);
    if (!$participant) {
        return response()->json(['error' => 'participant not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $participant->update($validatedData);
        return response()->json(['participant' => $participant], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }
    public function showparticipant($id){

        $participant = Participants::find($id);

        if (!$participant) return response()->json(['error' => 'participant not found'],404);
        else{
            return response()->json(['participant' => $participant],200);
        }
    }

    public function Allparticipants(){
        $participant=Participants::all();
        return response()->json(['participant' => $participant],200);
    }

    public function delelteparticipant($id){
        $participant=Participants::find($id);
        if (!$participant) return response()->json(['error' => 'participant not found '],404);
        else{
            $participant->delete();
            return response()->json(['message' => 'participant removed successfully'],200);
        }
    }
}
