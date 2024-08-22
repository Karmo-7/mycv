<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatigoryRequest;
use App\Http\Requests\UpCatigoryRequest;
use App\Models\Catigory;
use Illuminate\Http\Request;

class CatigoryController extends Controller
{
    public function addcatigory (CatigoryRequest $request,Catigory $catigory){
        $validate=$request->validated();
        if($validate){
             $newcatigory = $catigory->create($validate);
            return response()->json(['catigory' => $newcatigory],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }

     public function updatecatigory(UpCatigoryRequest $request, Catigory $catigory, $id)
    {
    $catigory = Catigory::with('Sport')->find($id);
    if (!$catigory) {
        return response()->json(['error' => 'catigogry not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $catigory->update($validatedData);
        return response()->json(['catigory' => $catigory], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }

     public function showcatigory($id){

        $catigory = Catigory::with('Sport')->find($id);

        if (!$catigory) return response()->json(['error' => 'catigory not found'],404);
        else{
            return response()->json(['catigory' => $catigory],200);
        }
    }

    public function Allcatigory(){
        $catigory=Catigory::with('Sport')->get();
        return response()->json(['catigory' => $catigory],200);
    }

    public function deleltecatigory($id){
        $catigory=Catigory::find($id);
        if (!$catigory) return response()->json(['error' => 'catigory not found '],404);
        else{
            $catigory->delete();
            return response()->json(['message' => 'catigory removed successfully'],200);
        }
    }
}
