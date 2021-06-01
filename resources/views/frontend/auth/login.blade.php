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
                            <div class="form-group">
                                <input type="email" name="email" placeholder="E-mail" autocomplete="no-email" />
                            </div>
                            
                            <input type="password" name="password" placeholder="Password" autocomplete="current-password"/>
                            <input type="submit" name="signup_submit" value="Login" />
                            <p><a href="#">Create an account</a></p>
                        </form>    
                    </div>
                    <div class="col-xs-12 col-md-1">
                        <span class="or">OR</span>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="mt-5 pt-5">
                            <p class="mb-5"></p>
                            <form class="p-5">
                            <button class="social-signin facebook">Log in with facebook</button>
                            <button class="social-signin twitter">Log in with Twitter</button>
                            <button class="social-signin google">Log in with Google+</button>
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
