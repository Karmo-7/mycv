<?php

namespace App\Http\Controllers;

use App\Http\Requests\discountRequest;
use App\Http\Requests\updiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function adddiscount(discountRequest $request,Discount $discount){
        if (!isset($validatedData['status'])) {
        $validatedData['status'] = 'active';
    }
        $validate=$request->validated();
        if($validate){
             $newdis = $discount->create($validate);
            return response()->json(['Discount' => $newdis],200);
        }
        return response()->json(['error' => $validate->errors()],400);
    }

     public function updatediscount(updiscountRequest $request, Discount $discount, $id)
    {
    $discount = Discount::find($id);
    if (!$discount) {
        return response()->json(['error' => 'Discount not found'], 404);
    }
    $validatedData = $request->validated();
    if ($validatedData) {
        $discount->update($validatedData);
        return response()->json(['Discount' => $discount], 200);
    }
    return response()->json(['error' => $validatedData->errors()], 400);
    }

     public function showdiscount($id){

        $discount = Discount::find($id);

        if (!$discount) return response()->json(['error' => 'discount not found'],404);
        else{
            return response()->json(['discount' => $discount],200);
        }
    }

    public function Alldiscount(){
        $discount=Discount::all();
        return response()->json(['Discounts' => $discount],200);
    }

       public function onlyact(){
        $discounts = Discount::where('status', 'active')->get();
        return response()->json(['Discounts' => $discounts],200);
    }

     public function deleltediscount($id){
        $discounts=Discount::find($id);
        if (!$discounts) return response()->json(['error' => 'discount not found '],404);
        else{
            $discounts->delete();
            return response()->json(['message' => 'discount removed successfully'],200);
        }
    }






}
