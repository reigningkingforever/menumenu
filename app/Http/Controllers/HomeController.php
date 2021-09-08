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
        // $calendars = MealCalendar::available()->whereHas('meal',function ($query) {
        //     $query->whereIn('origin',['local','intercontinental','chinese','italian'])
        //     ->whereIn('type',['food','drinks','fruits','pastries'])->whereIn('diet',['vegan','veg','nonveg']);
        // })->get();
        $calendars = MealCalendar::available()->whereHas('meal')->get();
        $tag = Tag::where('status',true)->get();
        $filter = ['category'=>  ['food','drinks','fruits','pastries'],
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
        return view('user.dashboard',compact('user'));
    }
    public function backend()
    {
        return view('backend.dashboard');
    }

}
