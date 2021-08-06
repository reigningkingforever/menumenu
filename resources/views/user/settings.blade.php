@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-centers">
	<div class="container">
	  	<div class="section-title">
			<h2>PREFERENCES</h2>
	  	</div>
		  <div class="row">
			<div class="col-lg-3 text-center">
				@include('user.menu')
			</div>
			<div class="col-lg-9">
				<div class="row">
                    <div class="col-md-8">
                        <div class="card mt-0">
                            <div class="card-body">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>Preferences</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <form action="{{route('user.settings.save')}}" method="POST">@csrf
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <td>Enable Email Notifications </td>
                                                <td class="text-center">
                                                    <div class="form-check">
                                                        <input class="radio_animated form-check-input" type="radio" name="email_notify" id="email_notify" value="1" @if($user->email_notify) checked @endif>
                                                        <label class="form-check-label"
                                                            for="email_notify">  
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Enable SMS Notifications </td>
                                                <td class="text-center">
                                                    <div class="form-check">
                                                        <input class="radio_animated form-check-input" type="radio" name="sms_notify" id="sms_notify" value="1" @if($user->sms_notify) checked @endif>
                                                        <label class="form-check-label"
                                                            for="sms_notify">  
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Get Reminers on Saved Meals </td>
                                                <td class="text-center">
                                                    <div class="form-check">
                                                        <input class="radio_animated form-check-input" type="radio" name="saved_reminders" id="saved_reminders" value="1" @if($user->saved_reminders) checked @endif>
                                                        <label class="form-check-label"
                                                            for="saved_reminders">  
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diet Type </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <select class="form-control" name="diet">
                                                            <option value="veg">Veg</option>
                                                            <option value="nonveg">NonVeg</option>
                                                            <option value="vegan">Vegan</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Food Allergies</td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <input type="text" name="allergies" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <button type="submit" class="form-control">Submit</button>
                                                    </div>
                                                </td>
                                            </tr>
                                                
                                            
                                        </table>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="preferences">
						
					</div> --}}
			</div>
		</div>
		
	</div>
</div>
@endsection
@push('scripts')

	
@endpush
