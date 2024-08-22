<?php

namespace App\Http\Controllers;

use App\Http\Requests\sportRequest;
use Illuminate\Http\Request;
use App\Models\Sport;
use Illuminate\Auth\Events\Validated;

class SportController extends Controller
{
    public function addsport (sportRequest $request,Sport $sport){
        $validate=$request->validated();
        if($validate){
             $newSport = $sport->create($validate);
            return response()->json(['sport' => $newSport],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }
    public function updateSport (sportRequest $request, Sport $sport,$id){
        $sport=Sport::find($id);
        if (!$sport) return response()->json(['error' => 'Sport not found'],404);
        else{
        $validate=$request->validated();
        if($validate){
            $sport->update($validate);
            return response()->json(['sport' => $sport],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }
    }
     public function showsport($id){
        $sport=Sport::find($id);
        if (!$sport) return response()->json(['error' => 'Sport not found'],404);
        else{
            return response()->json(['sport' => $sport],200);
        }
    }

    public function AllSports(){
        $sports=Sport::all();
        return response()->json(['sports' => $sports],200);
    }

    public function deleltesport($id){
        $sport=Sport::find($id);
        if (!$sport) return response()->json(['error' => 'Sport not found'],404);
        else{
            $sport->delete();
            return response()->json(['message' => 'Sport deleted successfully'],200);
        }
    }
}
