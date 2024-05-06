<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaystackController extends Controller
{

    public function redirectToGateway(Request  $request)
    {
        try{
            $request->request->add([
                "email"              => "sam@gmail.com",
                "orderID"              => "123456", // anything
                "amount"              => 150 * 100,
                "quantity"              => 1,                 "currency"              => "NGN", // change as per need
                "reference"              => Paystack::genTranxRef(),
                "metadata"              => json_encode(['key_name' => 'value']), // this should be related data
            ]);

            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    public function handleGatewayCallback(Request  $request)
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
    }
}
