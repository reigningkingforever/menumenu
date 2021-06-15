<?php

namespace App\Http\Controllers;

use Paystack;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    public function redirectToGateway()
    {//dd('i am nere');
        dd(Paystack::getAuthorizationUrl());
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
            dd(Paystack::getAuthorizationUrl());
        }catch(\Exception $e) {
            //dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   

     /**
     * BACKEND
     */
    public function list(){
        $payments = Payment::all();
        return view('backend.payments',compact('payments'));
    }

}
