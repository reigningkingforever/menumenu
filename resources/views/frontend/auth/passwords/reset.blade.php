@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>RESET PASSWORD</h2>
            <div id="login-box">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        
                        <span class="mb-5 visible-lg">
                            @if (session('status'))
                                <div class="text-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </span>
                        <form class="p-5" action="{{route('password.update')}}" method="POST">
                            <div class="mx-md-5 px-md-5">
                                <div class="mx-md-5 px-md-5">
                                    <div class="mx-md-3 px-md-5">
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        @error('email')
                                            <span class="small text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        <input type="email" name="email" placeholder="E-mail" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>
                                        
                                        @if ($errors->has('password'))
                                                <span class="small text-danger" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif
                                        <input type="password" name="password" placeholder="Password" autocomplete="current-password" required/>
                                        <input type="password" name="password_confirmation" placeholder="Repeat Password" autocomplete="current-password" required/>
                                        <button type="submit" class="btn btn-success btn-block">Reset Password" </button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </form>    
                    </div>
                    
                </div>
 
                
            </div>
            
	  	</div>
    </div>
</div>


@endsection





                     
            