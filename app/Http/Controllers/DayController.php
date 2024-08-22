<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DayRequest;
use App\Http\Requests\UpDayRequest;
use App\Models\Day;

class DayController extends Controller
{
     public function newday (DayRequest $request,Day $day){
        $validate=$request->validated();
        if($validate){
             $newday = $day->create($validate);
            return response()->json(['day' => $newday],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }

    public function updateday(UpDayRequest $request, Day $day, $id)
    {
    $day = Day::with('Sport')->find($id);
    if (!$day) {
        return response()->json(['error' => 'Day not add yet'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $day->update($validatedData);
        return response()->json(['room' => $day], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }

     public function showday($id){

        $day = Day::with('Sport')->find($id);

        if (!$day) return response()->json(['error' => 'day not added yet'],404);
        else{
            return response()->json(['day' => $day],200);
        }
    }

    public function Allday(){
        $days=Day::with('Sport')->get();
        return response()->json(['Days' => $days],200);
    }

    public function delelteday($id){
        $day=Day::find($id);
        if (!$day) return response()->json(['error' => 'day not added yet '],404);
        else{
            $day->delete();
            return response()->json(['message' => 'day removed successfully'],200);
        }
    }


}
