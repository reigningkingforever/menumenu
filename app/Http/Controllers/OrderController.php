<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{   
    /** FRONTEND*/
     
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
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
