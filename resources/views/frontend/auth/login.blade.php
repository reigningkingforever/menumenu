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
                        <form class="p-5" action="{{route('login')}}" method="POST">@csrf
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <input type="email" name="email" placeholder="E-mail" autocomplete="no-email" required />
                            
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <input type="password" name="password" placeholder="Password" autocomplete="current-password" required/>
                            <input type="submit" name="signup_submit" value="Login" />
                            <span class="visible-lg visible-md visible-sm visible-xs mt-3"><a href="{{route('password.request')}}">forgot your password?</a></span>
                        </form>    
                    </div>
                    <div class="col-xs-12 col-md-1">
                        <span class="or">OR</span>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="mt-5 pt-5">
                            <p class="mb-5"></p>
                            <form class="p-5">
                            {{-- <button class="social-signin facebook">Log in with facebook</button> --}}
                            <a href="{{ url('/login/facebook') }}" class="btn social-signin facebook">Log in with facebook</a>
                            <a href="{{ url('/login/twitter') }}" class="btn social-signin twitter">Log in with Twitter</a>
                            <a href="{{ url('/login/google') }}" class="btn social-signin google">Log in with Google+</a>
                            <a href="{{route('register')}}" class="d-block">Create an account</a>
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
@push('scripts')
<script>
    $('.facebook').click(function(){
        // alert(window.location.host+'/login/facebook');
        window.location.href(window.location.host+'/login/facebook');
    })    
    $('.twitter').click(function(){
        location.href(window.location.origin+'/login/twitter');
    })
    $('.google').click(function(){
        location.href(window.location.origin+'/login/google');
    })
</script>    
@endpush
