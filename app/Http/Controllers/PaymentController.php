<?php

namespace App\Http\Controllers;

use App\Http\Requests\paymentRequest;
use App\Models\Payment;
use App\Models\Participants_sport;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function cal(paymentRequest $request, Payment $payment)
{
    $validatedData = $request->validated();
    if ($validatedData) {
        $payments = Participants_sport::where('participants_id', $request->participants_id)
            ->where('status', 'active')
            ->get();

        $subscriptionOnePrices = [];
        foreach ($payments as $payment) {
            $subscriptionOnePrices[] = $payment->subscriptionOne_price;
        }
        return response()->json(['subscriptionOnePrices' => $subscriptionOnePrices]);
    } else {

        return response()->json(['error' => $validatedData->errors()], 400);
    }
}


}
