<?php

namespace App\Http\Controllers;

use App\Http\Requests\paymentRequest;
use App\Models\Discount;
use App\Models\Payment;
use App\Models\Participants_sport;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // public function ca(paymentRequest $request, Payment $payment)
    // {
    //     $validatedData = $request->validated();
    //     if ($validatedData) {
    //          $participantSport = Participants_sport::findOrFail($validatedData['participants_sports_id']);
    //            $discount = Discount::findOrFail($validatedData['discounts_id']);
    //          $subscriptionOnePrice = $participantSport->subscriptionOne_price;

    //          $sold = $discount->sold;

    //          $finalPrice = $subscriptionOnePrice * $sold;
    //           $payment = Payment::create([
    //         'participants_sports_id' => $validatedData['participants_sports_id'],
    //         'discounts_id' => $validatedData['discounts_id'],
    //         'amount' => $finalPrice,
    //     ]);
    //     return response()->json(['payment' => $payment], 201);


    //         $pricesport=Payment::with('participants_sports')->where('participants_sports_id',$request->participants_sports_id)->participants_sports()->get();
    //         // $pricesport->participants_sports()->subscriptionOne_price;




    //         // $payments=Payment::with('participants_sports');
    //         $payments = Payment::with('participants_sports')->get();
    //         // where('participants_sports_id', $request->participants_sports_id)
    //         // ->where('status', 'active')
    //         // ->get();
    //         // $payment->
    //         // $subscriptionOnePrices = [];
    //         // foreach ($payments as $payment)
    //         // {
    //         //     $subscriptionOnePrices[] = $payment->subscriptionOne_price;
    //         // }
    //         // $totalPrice = array_sum($subscriptionOnePrices);
    //         // $discount=Payment::where('discounts_id', $request->discounts_id)->where('status', 'active')->first();
    //         // $Ediscount = 1;
    //         // if ($discount) {
    //         //     $Ediscount = $discount->sold;
    //         // }
    //         // $endPrice=$totalPrice*$Ediscount;

    //         // $validatedData['amount'] = $endPrice;

    //         // $payment->create($validatedData);

    //         // // return response()->json(['total' => $subscriptionOnePrices,

    //         // // 'after sold'=>$endPrice]);
    //         // // return $endPrice;
    //         return response()->json(['payment' => $pricesport], 200);

    //     }
    //     else {
    //         return response()->json(['error' => $validatedData->errors()], 400);
    //     }

    // }
   public function cal(PaymentRequest $request, Payment $payment)
{
    $validatedData = $request->validated();
    if($validatedData){
        // return $request;
        $amount = $this->calculate($request);
        $validatedData['amount'] = $amount;
        $createdPayment = $payment->create($validatedData);
        if ($createdPayment) {
            return response()->json(['payment' => $createdPayment], 200);
        } else {
            return response()->json(['error' => 'Payment creation failed.'], 500);
        }
    } else{
            return response()->json(['error' => $validatedData->errors()], 400);
    }
}


    public function calculate($request)

    {
        $participantSport = Participants_sport::find($request->participants_sports_id);
         $subscriptionOnePrice = $participantSport->subscriptionOne_price;

        $discount = Discount::find($request->discounts_id);
        if ($discount && $discount->status == 'not_active') {
            $sold = 1;
        }
        else {
            $sold = $discount ? $discount->sold : 1;
        }
        $finalPrice = $subscriptionOnePrice * $sold;
        return $finalPrice;

        }

        // $discount = Discount::find($request->discounts_id);

        // if ($discount && $discount->status == 'not_active') {
        //     $sold = 1;
        // }
        // else {
        //     $sold = $discount ? $discount->sold : 1;
        // }
        // $finalPrice = $subscriptionOnePrice * $sold;
        // return $finalPrice;
    // }






//  public function calculate(paymentRequest $request,Payment $payment){
//     $validatedData = $request->validated();
//     if ($validatedData) {
//         $participaintportid=$payment->participants_sports()->where('id',$request->participants_sports_id)->first();
//         return $participaintportid;

//         // $psid=Payment::where('participants_sports_id',$request->participants_sports_id)->first();

//         // $dsid=Payment::with('discount')->where('discounts_id',$request->discounts_id)->first();
//         // // return $psid;
//         // $participante=$payment->participants_sports()->where('status','active')->find($psid)->;
//         // $discount=$payment->discount()->where('status','active')->find($dsid)->id;
//         // $participaintsportprice=$participante->subscriptionOne_price;
//         // $sold=$discount->sold;
//         // $final=$participaintsportprice*$sold;
//         // $validatedData['amount'] = $final;
//         // $e=$payment->create($validatedData);
//         // return response()->json(['payment'=>$e],200);


//     }
//     else {
//         return response()->json(['error' => $validatedData->errors()], 400);
//     }

// }









        // $participantsSportsId = $request->participants_sports_id;
        // $discountsId = $request->discounts_id;

        // $participaintsport=$payment->participants_sports()->where('status','active')->find($participantsSportsId );
        // $discount=$payment->discount()->where('status','active')->find($discountsId);

        // $participaintsportprice=$participaintsport->subscriptionOne_price;
        // $sold=$discount->sold;




}

