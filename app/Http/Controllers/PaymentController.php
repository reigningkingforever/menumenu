<?php

namespace App\Http\Controllers;


use App\Payment;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Traits\PaystackTrait;

class PaymentController extends Controller
{
    use PaystackTrait;

    public function pay()
    {
        $payment = $this->initialize();
        $verify = $this->verify();
        if($verify){

        }
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
