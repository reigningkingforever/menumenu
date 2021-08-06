<?php

namespace App\Http\Controllers;


use App\State;
use App\Town;
use App\City;
use Illuminate\Http\Request;
use App\Http\Traits\CartTrait;
use App\Http\Traits\BookmarkTrait;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    use BookmarkTrait,CartTrait;
    
    public function index(){
        // request()->session()->forget('cart');
        $cart = $this->validateCart();
        $order = $this->getOrder();
        $deliveries = $this->getDeliveries();
        $states = State::where('status',true)->get();
        $cities = City::whereIn('state_id',$states->pluck('id')->toArray())->get();
        $towns = Town::whereIn('city_id',$cities->pluck('id')->toArray())->with(['city'])->get();
        return view('frontend.cart',compact('cart','order','deliveries','states','towns'));
    }

    public function addtocart(Request $request){
        $cart = $this->addToCartSession($request->item_id);
        if(Auth::check())
        $this->addToCartDb($request->item_id);
        // return response()->json(['cart_count'=> count((array)$cart),'cart'=> $cart],200);
        return response()->json(['cart_count'=> collect($cart)->sum('quantity'),'cart'=> $cart],200);
    }

    public function removefromcart(Request $request){
        $cart = $this->removeFromCartSession($request->item_id);
        if(Auth::check())
        $this->removeFromCartDb($request->item_id);
        // return response()->json(['cart_count'=> count((array)$cart),'cart'=> $cart],200);
        return response()->json(['cart_count'=> collect($cart)->sum('quantity'),'cart'=> $cart],200);
    }

    public function addToBookmark(Request $request){
        $wish = $this->addBookmark($request->item_id);
        return response()->json(['wish_count'=> count((array)$wish)],200);
    }
    public function removeFromBookmark(Request $request){
        $wish = $this->removeBookmark($request->item_id);
        return response()->json(['wish_count'=> count((array)$wish)],200);
    }
    
    
    
    public function applycoupon(Request $request){
        $coupon = $this->getCoupon($request->coupon);
        return $coupon;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
