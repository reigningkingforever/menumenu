<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        // $url = secure_url('user/profile');
        // $url = https://bolasmenu.herokuapp.com/storage/photos/1/bolifish.jpg
        // $url = 'http://dailymenu.test/storage/photos/1/bolifish.jpg';
        // $baseurl = url('/');
        // $left = str_replace($baseurl,'',$url);

        return view('frontend.auth.login');
    }

    protected function sendLoginResponse(Request $request)
    {
        $cart = session('cart');

        $request->session()->regenerate();

        session(['cart' => $cart]);

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        $data = session()->get('cart');

        $this->guard()->logout();

        $request->session()->invalidate();

        session()->put('cart', $data);
        
        return $this->loggedOut($request) ?: redirect('/');
    }

    
}
