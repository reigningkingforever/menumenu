<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
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

        foreach($order->item as $item){
            $cart = $this->addToCartSession($item->calendar_id);
            $this->addToCartDb($item->calendar_id);
        }
        $order->delete();
        return redirect()->route('cart');
    }
    
    public function show(Order $order)
    {
        foreach($order->items as $item){
            if($item->required_at < Carbon::now())
            $item->delete();
        }
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
            foreach($order->items as $detail){
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
