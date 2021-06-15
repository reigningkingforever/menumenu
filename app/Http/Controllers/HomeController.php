<?php

namespace App\Http\Controllers;

use App\City;
use App\Menu;
use App\State;
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
        $menus = Menu::where('size','medium')->get();
        $filter = ['itemtype'=>  ['food','drinks','fruits','pastries'],
                    'origin' => ['local','intercontinental','chinese','italian'],
                    'diet' => ['vegan','veg','nonveg'],
                    'size' => 'medium'
                    ];
        return view('frontend.home',compact('menus','filter'));
    }

    public function user()
    {   
        $user = Auth::user();
        $states = State::where('status',true)->get();
        $cities = City::whereIn('state_id',$states->pluck('id')->toArray())->get();
        return view('user.dashboard',compact('user','states','cities'));
    }
    public function backend()
    {
        return view('backend.dashboard');
    }

}
