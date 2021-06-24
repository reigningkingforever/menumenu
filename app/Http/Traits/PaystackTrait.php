<?php
namespace App\Http\Traits;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;

trait PaystackTrait
{

    protected function initialize(){
        $user - Auth::user();
        $response = Curl::to('https://api.paystack.co/transaction/initialize')
        ->withHeader('Authorization: Bearer sk_live_1bb98205998c469512e315cbe61691e3472866db')
        ->withData( array( 'email' => "customer@email.com",'amount'=> "20000",'metadata' => ['product'=>'premium'] ) )
        ->asJson()
        ->post();
        $response = json_decode($result);
        //dd($response);
        if(!$response || !$response->status) 
        return false;
    }
    // {
    //     "status": true,
    //     "message": "Authorization URL created",
    //     "data": {
    //       "authorization_url": "https://checkout.paystack.com/0peioxfhpn",
    //       "access_code": "0peioxfhpn",
    //       "reference": "7PVGX8MEk85tgeEpVDtD"
    //     }
    //   }

    protected function verify(){
        $transactionRef = request()->query('trxref');
        $paymentDetails = Curl::to('https://api.paystack.co/transaction/verify/'.$transactionRef)
         ->withHeader('Authorization: Bearer sk_test_30c5651e1fa89e38d79ab5768016cda82caecdea')
         ->get();
        //dd($paymentDetails);
        $product = $paymentDetails['data']['metadata']['product'];
        $payout = $paymentDetails['data']['metadata']['payout'];
        $payment_status = $paymentDetails['data']['status'];
        $payment_amount = $paymentDetails['data']['amount'];
        $customer_email = $paymentDetails['data']['customer']['email'];
        $user = User::find(1);
        $customer = User::whereEmail($customer_email)->first();
        if ($payment_status == 'success') {

        }else {
            flash('Payment was not successful')->error();
        }

        return redirect('home');
    }
    // {
    //     "status": true,
    //     "message": "Verification successful",
    //     "data": {
    //       "amount": 27000,
    //       "currency": "NGN",
    //       "transaction_date": "2016-10-01T11:03:09.000Z",
    //       "status": "success",
    //       "reference": "DG4uishudoq90LD",
    //       "domain": "test",
    //       "metadata": 0,
    //       "gateway_response": "Successful",
    //       "message": null,
    //       "channel": "card",
    //       "ip_address": "41.1.25.1",
    //       "log": {
    //         "time_spent": 9,
    //         "attempts": 1,
    //         "authentication": null,
    //         "errors": 0,
    //         "success": true,
    //         "mobile": false,
    //         "input": [],
    //         "channel": null,
    //         "history": [{
    //           "type": "input",
    //           "message": "Filled these fields: card number, card expiry, card cvv",
    //           "time": 7
    //           },
    //           {
    //             "type": "action",
    //             "message": "Attempted to pay",
    //             "time": 7
    //           },
    //           {
    //             "type": "success",
    //             "message": "Successfully paid",
    //             "time": 8
    //           },
    //           {
    //             "type": "close",
    //             "message": "Page closed",
    //             "time": 9
    //           }
    //         ]
    //       }
    //       "fees": null,
    //       "authorization": {
    //         "authorization_code": "AUTH_8dfhjjdt",
    //         "card_type": "visa",
    //         "last4": "1381",
    //         "exp_month": "08",
    //         "exp_year": "2018",
    //         "bin": "412345",
    //         "bank": "TEST BANK",
    //         "channel": "card",
    //         "signature": "SIG_idyuhgd87dUYSHO92D",
    //         "reusable": true,
    //         "country_code": "NG",
    //         "account_name": "BoJack Horseman"
    //       },
    //       "customer": {
    //         "id": 84312,
    //         "customer_code": "CUS_hdhye17yj8qd2tx",
    //         "first_name": "BoJack",
    //         "last_name": "Horseman",
    //         "email": "bojack@horseman.com"
    //       },
    //       "plan": "PLN_0as2m9n02cl0kp6",
    //       "requested_amount": 1500000
    //     }
    //   }
}