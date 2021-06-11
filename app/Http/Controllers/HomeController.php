<?php

namespace App\Http\Controllers;

use App\Menu;
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
        return view('user.dashboard',compact('user'));
    }
    public function backend()
    {
        return view('backend.dashboard');
    }
}
