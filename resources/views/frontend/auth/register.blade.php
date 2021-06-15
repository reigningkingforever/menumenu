@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>REGISTER</h2>
            <div id="login-box">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        {{-- <h1>Register</h1> --}}
                        {{-- <span class="mb-5 visible-lg"></span> --}}
                        <form class="px-4 py-5" action="{{route('register')}}" method="POST">@csrf
                            @if ($errors->has('name'))
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="name" placeholder="Your Name" autocomplete="no-name"  required/>
                            @if ($errors->has('email'))
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                             @endif                            
                            <input type="email" name="email" placeholder="E-mail" autocomplete="no-email" required/>
                            @if ($errors->has('phone'))
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                             @endif                            
                            <input type="text" name="phone" placeholder="Phone number" autocomplete="no-email" required/>
                            @if ($errors->has('password'))
                                    <span class="small text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <input type="password" name="password" placeholder="Password" autocomplete="current-password" required/>
                            <input type="password" name="password_confirmation" placeholder="Repeat Password" autocomplete="current-password" required/>
                            <input type="submit" name="signup_submit" value="Sign me up" />
                            
                        </form>    
                    </div>
                    <div class="col-xs-12 col-md-1">
                        <span class="or">OR</span>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="mt-5 pt-5">
                            <p class="mb-5"></p>
                            <form class="p-5">
                            <button class="social-signin facebook">Register with facebook</button>
                            <button class="social-signin twitter">Register with Twitter</button>
                            <button class="social-signin google">Register with Google+</button>
                            <a href="{{route('login')}}">Back to Login</a>
                            </form>
                        </div>
                    </div>
                </div>
 
                {{-- <div class="or">OR</div> --}}
            </div>
            
	  	</div>
    </div>
</div>


@endsection
