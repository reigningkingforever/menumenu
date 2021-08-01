<?php

namespace App\Http\Controllers;

use App\Tag;
use App\City;
use App\Town;
use App\State;
use App\MealCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('front');
    }
    protected function dashboard(){
        return redirect()->route(Auth::user()->role == "admin" ? 'admin.home':'user.home');
    }

    public function front(){
        $calendars = MealCalendar::available()->whereIn('period',['breakfast','lunch','dinner'])->whereHas('meal',function ($query) {
            $query->whereIn('origin',['local','intercontinental','chinese','italian'])->whereIn('type',['food','drinks','fruits','pastries'])->whereIn('diet',['vegan','veg','nonveg']);
        })->get();
        $tag = Tag::where('status',true)->get();
        $filter = ['itemtype'=>  ['food','drinks','fruits','pastries'],
                    'period'=>  ['breakfast','lunch','dinner','dessert'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'diet' => ['vegan','veg','nonveg'],
                    'cost' => '0,20000',
                    ];
        return view('frontend.home',compact('calendars','filter'));
        
    }

    public function user()
    {   
        $user = Auth::user();
        $states = State::where('status',true)->get();
        $cities = City::whereIn('state_id',$states->pluck('id')->toArray())->get();
        $towns = Town::whereIn('city_id',$cities->pluck('id')->toArray())->with(['city'])->get();
        return view('user.dashboard',compact('user','states','cities','towns'));
    }
    public function backend()
    {
        return view('backend.dashboard');
    }

}
