<?php

namespace App\Http\Controllers;

use App\City;
use App\Meal;
use App\Town;
use App\State;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function list(){
        $coupons = Coupon::all();
        return view('backend.coupon.list',compact('coupons'));
    }
    public function create(){
        $meals = Meal::all();
        $states = State::all();
        $cities = City::all();
        $towns = Town::all();
        return view('backend.coupon.create',compact('meals','states','cities','towns'));
    }
    public function store(Request $request){
        // dd($request->all());
        $coupon = new Coupon;
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->start_at = $request->start_date ? Carbon::createFromFormat('m/d/Y',$request->start_date): null;
        $coupon->end_at = $request->end_date ? Carbon::createFromFormat('m/d/Y',$request->end_date): null;
        $coupon->available = $request->quantity;
        $coupon->is_percentage = $request->type == 'percent' ? true:false;
        $coupon->value = $request->value;
        $coupon->free_shipping = $request->shipping ? true:false;
        $coupon->status = $request->status ? true:false;
        $coupon->meal_limit = $request->meals ? $request->meals : null;
        $coupon->state_limit = $request->states ? $request->states : null;
        $coupon->city_limit = $request->cities ? $request->cities : null;
        $coupon->town_limit = $request->towns ? $request->towns : null;
        $coupon->maximum_spend = $request->maximum_spend;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->limit_per_user = $request->per_customer ? $request->per_customer : null;
        $coupon->save();
        return redirect()->route('admin.coupon.list');
    }
    public function edit(Coupon $coupon){
        $meals = Meal::all();
        $states = State::all();
        $cities = City::all();
        $towns = Town::all();
        return view('backend.coupon.edit',compact('coupon','meals','states','cities','towns'));
    }

    public function update(Coupon $coupon,Request $request){
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->start_at = $request->start_date ? Carbon::createFromFormat('m/d/Y',$request->start_date): null;
        $coupon->end_at = $request->end_date ? Carbon::createFromFormat('m/d/Y',$request->end_date): null;
        $coupon->available = $request->quantity;
        $coupon->is_percentage = $request->type == 'percent' ? true:false;
        $coupon->value = $request->value;
        $coupon->free_shipping = $request->shipping ? true:false;
        $coupon->status = $request->status ? true:false;
        $coupon->meal_limit = $request->meals ? $request->meals : null;
        $coupon->state_limit = $request->states ? $request->states : null;
        $coupon->city_limit = $request->cities ? $request->cities : null;
        $coupon->town_limit = $request->towns ? $request->towns : null;
        $coupon->maximum_spend = $request->maximum_spend;
        $coupon->minimum_spend = $request->minimum_spend;
        $coupon->limit_per_user = $request->per_customer ? $request->per_customer : null;
        return redirect()->route('admin.coupon.list')->with(['flash_type' => 'success','flash_msg' => 'Coupon Edited Successfully']);
    
        
    }

    public function delete(Request $request){
        $coupon = Coupon::find($request->coupon_id);
        $coupon->delete();
        return redirect()->back();
    }
}
