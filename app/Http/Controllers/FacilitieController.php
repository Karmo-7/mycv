<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacililtieRequest;
use App\Http\Requests\UpFacililtieRequest;
use App\Models\Facilitie;
use Illuminate\Http\Request;

class FacilitieController extends Controller
{
    public function addfacilities(FacililtieRequest $request, Facilitie $facilitie)
{
    $validatedData = $request->validated();

    if ($validatedData) {

        $newFacilitie = $facilitie->create($validatedData);
        if ($request->has('sports_id')) {
            $sportIds = $request->input('sports_id');
            $newFacilitie->Sport()->attach($sportIds);
        }
        $newFacilitie->load('Sport');
        return response()->json(['facilities' => $newFacilitie], 200);
    }

    return response()->json(['error' => $validatedData->errors()], 400);
}


       public function updatefacilitie(UpFacililtieRequest $request, Facilitie $facilitie, $id)
{

    $facilitie = Facilitie::find($id);
    if (!$facilitie) {
        return response()->json(['error' => 'Facilitie not found'], 404);
    }

    $validatedData = $request->validated();
    if ($validatedData) {

        $newfacilitie = $facilitie->update($validatedData);

        if ($newfacilitie) {
            if ($request->has('sports_id')) {
                $sportsId = $request->input('sports_id');
                $facilitie->Sport()->sync($sportsId);
            }
            $facilitie->load('Sport');
            return response()->json(['facilitie' => $facilitie], 200);
        }
    }
    return response()->json(['error' => $validatedData->errors()], 400);
}


    public function showfacilitie($id){

        $facilitie = Facilitie::find($id);

        if (!$facilitie) return response()->json(['error' => 'facilitie not found'],404);
        else{

            return response()->json(['facilitie' => $facilitie],200);
        }
    }

    public function Allfacilitie(){
        $facilitie=Facilitie::get();
        return response()->json(['facilitie' => $facilitie],200);
    }

    public function deleltefacilitie($id){
        $facilitie=Facilitie::find($id);
        if (!$facilitie) return response()->json(['error' => 'facilitie not found '],404);
        else{
            $facilitie->delete();
            return response()->json(['message' => 'facilitie removed successfully'],200);
        }
    }
}
