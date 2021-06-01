@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>WELCOME</h2>
            <div id="login-box">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <h1>Login</h1>
                        <span class="mb-5 visible-lg"></span>
                        <form class="p-5">
                            <input type="type" name="name" placeholder="Your Name" autocomplete="no-name" />
                            <input type="email" name="email" placeholder="E-mail" autocomplete="no-email" />
                            <input type="password" name="password" placeholder="Password" autocomplete="current-password"/>
                            <input type="password" name="confirm-password" placeholder="Repeat Password" autocomplete="current-password"/>
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
