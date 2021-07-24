<?php

namespace App\Http\Controllers;

use App\Order;
use App\Coupon;
use App\Payment;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Traits\PaystackTrait;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{   
    use PaystackTrait;
    /** FRONTEND*/
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        // $orders = Auth::user();
        // return view('')
    }

    public function checkout(Order $order){
        //check whether this order is still valid
        $user = Auth::user();
        $response = $this->initializePayment($order);
        if(!$response || !$response->status){
            foreach($order->details as $detail){
                $detail->delete();
            }
            $order->delete();
            return redirect()->route('cart');
        }
        else{
            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->order_id = $order->id;
            if($order->coupon_code) $payment->coupon_id = Coupon::where('code',$request->coupon_used)->first()->id;
            $payment->amount= $order->amount;
            $payment->save();
            return redirect()->to($response->data->authorization_url);
        }
    }
    
    public function show(Order $order)
    {
        return view('user.order',compact('order'));
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function delete(Order $order)
    {
        if($order->status == 'completed'){
            foreach($order->details as $detail){
                $detail->delete();
            }
            $order->delete();
        }
        return redirect()->back();
    }

    /**
     * BACKEND
     */
    public function list(){
        $orders = Order::all();
        return view('backend.order.list',compact('orders'));
    }
    public function view(Order $order){
        return view('backend.order.view',compact('order'));
    }
    public function status(Request $request,Order $order){
        return redirect()->back();
    }
    public function purchase(Request $request,Order $order){
        
    }
    public function modify(){
        
    }
    public function destroy(){

    }

}
