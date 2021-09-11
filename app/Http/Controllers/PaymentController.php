<?php

namespace App\Http\Controllers;


use App\User;
use App\Order;
use App\Coupon;
use App\Payment;
use App\Delivery;
use App\OrderDetail;
use App\MealCalendar;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Traits\PaystackTrait;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use PaystackTrait;

    public function __construct(){
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $user_address = $user->addresses->where('status',true)->first()->address.' '.$user->addresses->where('status',true)->first()->town->name.' '.$user->addresses->where('status',true)->first()->city->name.' '.$user->addresses->where('status',true)->first()->state->name;
        $coupon_id = '';
        if($request->coupon_used) $coupon_id = Coupon::where('code',$request->coupon_used)->first()->id;
        $order = Order::create(['user_id'=> $user->id,'subtotal'=> $request->subtotal,
        'discount'=> $request->discount,'coupon_code' => $request->coupon_used,'vat'=> $request->vat,
        'delivery_fee'=> $request->delivery,'delivery_address'=> $user_address,'amount'=> $request->grandtotal]);
        
        foreach($request->item as $item){
            $calendar_id = json_decode($item)->id;
            $detail = new OrderDetail;
            $detail->order_id = $order->id;
            $detail->calendar_id = $calendar_id;
            $detail->quantity = json_decode($item)->quantity;
            $detail->required_at = MealCalendar::find($calendar_id)->start_at;
            $detail->save();
        }
        foreach($order->items->sortBy('required_at') as $item){
            $deliver = Delivery::firstOrCreate(['user_id'=> $user->id,'order_id'=> $order->id,'delivery_date'=> $item->required_at->format('Y-m-d')],
            ['delivery_time'=> $item->required_at->format('H:i:s'),'address'=> $user_address]);
        }
        //initiate payment
        $response = $this->initializePayment($order);
        if(!$response || !$response->status){
            foreach($order->items as $item){
                $item->delete();
            }
            $order->delete();
            return redirect()->route('cart');
        }
        else{
            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->order_id = $order->id;
            if($coupon_id) $payment->coupon_id = $coupon_id;
            $payment->amount= $order->amount;
            $payment->save();
            return redirect()->to($response->data->authorization_url);
        }
        
    }

    
    public function verification()
    {
        $user = Auth::user();
        if(!request()->query('trxref'))
        return redirect()->route('user.home');
        $paymentDetails = json_decode($this->verifyPayment(request()->query('trxref')));
        if(!$paymentDetails)
        return redirect()->route('user.home');
        $order_id = $paymentDetails->data->metadata->order_id;
        $payment_status = $paymentDetails->data->status;
        $payment_amount = $paymentDetails->data->amount;
        $payment_method = $paymentDetails->data->channel;
        $customer_email = $paymentDetails->data->customer->email;
        $order = Order::find($order_id);
        $user = User::whereEmail($customer_email)->first();
        if ($payment_status == 'success' && $order->amount == $payment_amount/100) {
            $order->status = 'paid';
            $order->save();
            $payment = Payment::where('order_id',$order->id)->first();
            $payment->method = $payment_method;
            $payment->status = 'success';
            $payment->save();
            request()->session()->forget('cart');
            return redirect()->route('user.order.show',$order);
        }else {
            foreach($order->items as $detail){
                $detail->delete();
            }
            $order->delete();
            return redirect()->route('cart'); //with(Payment was not successful)
        }

        
    }

    public function userTransactions(){
        $user = Auth::user();
        return view('user.transactions',compact('user'));
    }

     /**
     * BACKEND
     */
    public function list(){
        $payments = Payment::all();
        return view('backend.payments',compact('payments'));
    }

}
