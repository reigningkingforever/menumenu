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
        $calendars = MealCalendar::available()->whereHas('meal')->get();
        $tags = Tag::where('status',true)->get();
        $filter = ['category'=>  $tags->where('type','category')->pluck('name')->toArray(),
                    'period'=>  $tags->where('type','period')->pluck('name')->toArray(),
                    'origin' => $tags->where('type','origin')->pluck('name')->toArray(),
                    'diet' => $tags->where('type','diet')->pluck('name')->toArray(),
                    'cost' => '0,20000',
                    ];
        return view('frontend.home',compact('calendars','filter','tags'));
        
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
