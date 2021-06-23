<?php

namespace App\Http\Controllers;

use App\City;
use App\Town;
use App\State;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function list(){
        $states = State::all();
        $cities = City::all();
        $towns = Town::all();
        return view('backend.settings.list',compact('states','cities','towns'));
    }

    public function state(Request $request){
        $state = State::where('id',$request->state_id)->update(['status'=> $request->status]);
        return redirect()->back();
    }
    public function cities(Request $request){
        $cities = City::whereIn('id',$request->cities)->update(['status'=> $request->status]);
        return redirect()->back();
    }
    public function towns(Request $request){
        $towns = Town::whereIn('id',$request->towns)->update(['status'=> $request->status]);
        return redirect()->back();
    }
}
