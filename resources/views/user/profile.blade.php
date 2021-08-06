@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-centers">
	<div class="container">
	  	<div class="section-title">
			<h2>PROFILE</h2>
	  	</div>
		  <div class="row">
			<div class="col-lg-3 text-center">
				@include('user.menu')
			</div>
			<div class="col-lg-9">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card mt-0">
                            <div class="card-body">
                                <div class="dashboard-box">
                                    
                                    <div class="row my-5">
                                        <form class="mt-5" action="{{route('user.profile.save')}}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="col-md-12 d-flex flex-column flex-md-row">
                                                <div class="d-flex flex-column flex-md-row">
                                                    <div class="text-center">
                                                        <img @if($user->image) src="{{asset('storage/users/'.$user->image)}}" @else src="{{asset('img/no-image.jpg')}}" @endif class="avatar rounded my-0" width="200px" height="200px" id="featured">
                                                        <a href="javascript:void(0)" class="text-muted d-block" id="set_cover">Upload Picture</a>
                                                        <input type="file" name="file" id="cover" style="display:none;">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex flex-column flex-md-row">
                                                            <div class="form-group mx-3 w-100">
                                                                <label>Name</label>
                                                                <input type="text" name="name" value="{{$user->name ?? old('name')}}" class="form-control" placeholder="Name">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mx-3 w-100">
                                                                <label>Phone</label>
                                                                <input type="text" name="phone" class="form-control" value="{{$user->phone ?? old('phone')}}" placeholder="Phone">
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class=" d-flex flex-column flex-md-row">
                                                            <div class="form-group mx-3">
                                                                <label>Date of Birth</label>
                                                                <input type="date" name="birthday" class="form-control" value="{{$user->birthday ? $user->birthday->format('Y-m-d') : old('birthday')}}" placeholder="Birthday">
                                                                @error('birthday')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mx-3">
                                                                <label>Wedding Anniversary (optional)</label>
                                                                <input type="date" name="anniversary" class="form-control" value="{{$user->wedding_anniversary ? $user->wedding_anniversary->format('Y-m-d') : old('anniversary')}}" placeholder="Wedding">
                                                                @error('anniversary')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column flex-md-row justify-content-center">
                                                            <button type="submit" class="btn btn-primary">Save Profile</button>
                                                        </div>
                                                    </div>	
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Password</h4>
                                            <form class="mt-5" action="{{route('user.password')}}" method="POST">@csrf
                                                <div class="d-flex flex-column flex-md-row justify-content-between">
                                                    <div class="form-group mx-2">
                                                        <label>Old Password</label>
                                                        <input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
                                                        @error('oldpassword')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mx-2">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mx-2">
                                                        <label>Repeat Password</label>
                                                        <input type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Change</button>
                                                        
                                                    </div>
                                                        
                                                </div>
                                                
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Addresses</h4>
                                            <form class="mt-5" action="{{route('user.address')}}" method="POST">@csrf
                                                @forelse ($user->addresses as $place)
                                                    <div class="row row-no-gutter mb-4 companydocument">
                                                        <div class="mx-3">
                                                            <div class="input-group d-flex flex-column flex-md-row">
                                                                <span class="input-group-addon w-100 w-md-50">
                                                                    <span class="mx-2">Default</span><input type="radio" name="status[]" @if($place->status) checked @endif value="1" required aria-label="...">
                                                                </span>
                                                                
                                                                <input type="text" class="form-control" name="address[]" value="{{$place->address ?? old('address')}}" placeholder="Address" required>
                                                                <select name="town_id[]" class="form-control city" required>
                                                                    @foreach ($towns as $town)
                                                                        <option value="{{$town->id}}" @if($town->id == $place->town_id) checked @endif>{{$town->name.', '.$town->city->name.' LGA'}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <select name="state_id[]" class="form-control state" required>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{$state->id}}" @if($state->id == $place->state_id) checked @endif>{{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if(!$loop->first)<a href="javascript:void(0)" class="btn btn-danger btn-sm removemore">Remove</a>@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                <div class="row row-no-gutter mb-4 companydocument">
                                                    <div class="mx-3">
                                                        <div class="input-group d-flex flex-column flex-md-row">
                                                            <span class="input-group-addon w-100 w-md-50">
                                                                <span class="mx-2">Default</span><input type="radio" name="status[]" value="1" required aria-label="...">
                                                            </span>
                                                            
                                                            <input type="text" class="form-control" name="address[]" placeholder="Address" required>
                                                            <select name="town_id[]" class="form-control city" required>
                                                                @foreach ($towns as $town)
                                                                    <option value="{{$town->id}}">{{$town->name.', '.$town->city->name.' LGA'}}</option>
                                                                @endforeach
                                                            </select>
                                                            <select name="state_id[]" class="form-control state" required>
                                                                @foreach ($states as $state)
                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-push-6 mb-3">
                                                        <a href="javascript:void(0)" class="btn btn-primary addmore">Add New Address</a>
                                                    </div>
                                                    <div class="col-md-6 col-lg-pull-6">
                                                        <button class="btn btn-success btn-block">Save</button>
                                                    </div>
                                                    
                                                </div>
                                                  
                                                
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="preferences">
						<div class="row">
							<div class="col-md-12">
								<div class="card mt-0">
									<div class="card-body">
										<div class="dashboard-box">
											<div class="dashboard-title">
												<h4>Preferences</h4>
											</div>
											<div class="dashboard-detail">
												<div class="account-setting">
													<h5>Notifications</h5>
													<div class="row">
														<div class="col">
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios"
																	id="exampleRadios1" value="option1" checked>
																<label class="form-check-label"
																	for="exampleRadios1">
																	Allow Desktop Notifications
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios"
																	id="exampleRadios2" value="option2">
																<label class="form-check-label"
																	for="exampleRadios2">
																	Enable Notifications
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios"
																	id="exampleRadios3" value="option3">
																<label class="form-check-label"
																	for="exampleRadios3">
																	Get notification for my own activity
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios"
																	id="exampleRadios4" value="option4">
																<label class="form-check-label"
																	for="exampleRadios4">
																	DND
																</label>
															</div>
														</div>
													</div>
												</div>
												<div class="account-setting">
													<h5>deactivate account</h5>
													<div class="row">
														<div class="col-md-12">
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios1"
																	id="exampleRadios4" value="option4" checked>
																<label class="form-check-label"
																	for="exampleRadios4">
																	I have a privacy concern
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios1"
																	id="exampleRadios5" value="option5">
																<label class="form-check-label"
																	for="exampleRadios5">
																	This is temporary
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios1"
																	id="exampleRadios6" value="option6">
																<label class="form-check-label"
																	for="exampleRadios6">
																	other
																</label>
															</div>
															<button type="button"
																class="btn btn-solid btn-xs">Deactivate
																Account</button>
														</div>
													</div>
												</div>
												<div class="account-setting">
													<h5>Delete account</h5>
													<div class="row">
														<div class="col-md-12">
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios3"
																	id="exampleRadios7" value="option7" checked>
																<label class="form-check-label"
																	for="exampleRadios7">
																	No longer usable
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios3"
																	id="exampleRadios8" value="option8">
																<label class="form-check-label"
																	for="exampleRadios8">
																	Want to switch on other account
																</label>
															</div>
															<div class="form-check">
																<input class="radio_animated form-check-input"
																	type="radio" name="exampleRadios3"
																	id="exampleRadios9" value="option9">
																<label class="form-check-label"
																	for="exampleRadios9">
																	other
																</label>
															</div>
															<button type="button"
																class="btn btn-solid btn-xs">Delete Account</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
			</div>
		</div>
		
	</div>
</div>
@endsection
@push('scripts')
	<script>
        $("#set_cover").click(function() {
            $('#cover').trigger('click');
        });
		$("#cover").change(function() {
			readURL(this,'featured');
			// $('#remove_image').show();
		});
		function readURL(input,output) {
			console.log(input.id);
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
				$('#'+output).attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
	<script>
		var towns = @JSON($towns);
		var cities = @JSON($cities);
		var states = @JSON($states);
		var state_options = '';
		var town_options = '';
		console.log(towns[0].city.name);
		for(var i=0;i<states.length;i++){
			state_options += '<option value="'+states[i].name+'">'+states[i].name+'</option>';
		}
		for(var i=0;i<towns.length;i++){
			town_options += '<option value="'+towns[i].name+'">'+towns[i].name+', '+towns[i].city.name+' LGA</option>';
		}
		$(document).on('click','.addmore',function(){
			var product =  	`<div class="row row-no-gutter mb-4 companydocument">
								<div class="mx-3">
									<div class="input-group d-flex flex-column flex-md-row">
										<span class="input-group-addon w-100 w-md-50">
											<span class="mx-2">Default</span><input type="radio" name="status[]" value="1" required aria-label="...">
										</span>
										
										<input type="text" class="form-control" name="address[]" placeholder="Address" required>
										<select name="town_id[]" class="form-control city" required>`+
											town_options+`
										</select>
										<select name="state_id[]" class="form-control" required>`+
											state_options+`
										</select>
										<a href="javascript:void(0)" class="btn btn-danger btn-sm removemore">Remove</a>
									</div>
								
								</div>
							</div>`;
			$('.companydocument').last().after(product);
		});
		
		$(document).on('click','.removemore',function(){
			if($('.companydocument').length > 1){
				$(this).closest('.companydocument').remove();
			}
		});
	</script>
@endpush
