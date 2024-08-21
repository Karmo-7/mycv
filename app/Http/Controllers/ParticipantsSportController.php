<?php

namespace App\Http\Controllers;

use App\Http\Requests\PSRequest;
use App\Http\Requests\upPSRequest;
use App\Models\Participants_sport;
use Illuminate\Http\Request;

class ParticipantsSportController extends Controller
{
    public function register(PSRequest $Request,Participants_sport $participants){
        $validate=$Request->validated();
        if($validate){
             $newParticipant = $participants->create($validate);
             $newParticipant->load('sport','participants');
             return response()->json(['participant' => $newParticipant],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }
    

     public function showRemainingDays($id)
     {
        $participantSport = Participants_sport::find($id);
        if (!$participantSport) {
            return response()->json(['error' => 'Participant not found'], 404);
        }
        $remainingDays = $participantSport->remaining_days;
        $status = $participantSport->status;
        return response()->json([
            'participant_id' => $participantSport->id,
            'remaining_days' => $remainingDays,
            'status' => $status,
        ], 200);
    }


    public function updateregister(upPSRequest $request, Participants_sport $participants_sport, $id)
    {
    $participants_sport = Participants_sport::find($id);
    if (!$participants_sport) {
        return response()->json(['error' => 'Participants not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $participants_sport->update($validatedData);
        return response()->json(['Participants' => $participants_sport], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }

}
