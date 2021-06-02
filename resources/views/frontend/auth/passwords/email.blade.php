@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>FORGOT PASSWORD</h2>
            <div id="login-box">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <h3>Find your account</h3>
                        <span class="mb-5 visible-lg">
                            @if (session('status'))
                                <div class="text-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </span>
                        <form class="p-5" action="{{route('password.email')}}" method="POST">@csrf
                            @error('email')
                                <span class="small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                            
                            
                            <button type="submit" class="btn btn-success">Send Password Reset Link" </button>
                            <span class="visible-lg visible-md visible-sm visible-xs mt-5"><a href="{{route('login')}}">Back to login</a></span>
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
                            <a href="{{route('register')}}">Create an account</a>
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




