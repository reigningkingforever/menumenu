@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>DASHBOARD</h2>
	  	</div>
		  <div class="row">
			<div class="col-lg-3">
				@include('user.menu')
			</div>
			<div class="col-lg-9">
				<div class="faq-content tab-content" id="top-tabContent">
					<div class="tab-pane fade active in" id="dashboard">
						<div class="counter-section">
							<div class="row">
								<div class="col-md-4">
									<div class="counter-box">
										<img src="{{asset('img/order.png')}}" class="img-fluid">
										<div>
											<h3>{{$user->bookmarks->count()}}</h3>
											<h5>total Saved</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-box">
										<img src="{{asset('img/sale.png')}}" class="img-fluid">
										<div>
											<h3>{{$user->orders->count()}}</h3>
											<h5>total Orders</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-box">
										<img src="{{asset('img/homework.png')}}" class="img-fluid">
										<div>
											<h3>{{$user->orderDetails->count()}}</h3>
											<h5>total meals</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-6">
								<div class="card dashboard-table">
									<div class="card-body">
										<h3>Saved Menu</h3>
										<table class="table mb-0 text-left">
											<thead>
												<tr>
													<th scope="col">image</th>
													<th scope="col">product name</th>
													<th scope="col">size</th>
													<th scope="col">price</th>
													
												</tr>
											</thead>
											<tbody>
												@forelse ($user->bookmarks->where('eatable_type','App\Menu') as $menu)
													<tr>
														<th scope="row">
															@if(!$menu->eatable->media)
																<img src="{{asset('img/no-image.jpg')}}" alt="{{$menu->eatable->name}}" class="blur-up lazyloaded">
																@else
																<img src="{{asset('storage/meals/'.$menu->eatable->media->name)}}" alt="{{$menu->eatable->name}}" class="blur-up lazyloaded">
															@endif
														</th>
														<td>{{$menu->eatable->name}}</td>
														<td>{{$menu->eatable->type.' :'.$menu->eatable->size}}</td>
														<td>₦{{$menu->eatable->price}}</td>
														
													</tr>
												@empty
													<tr>
														<th colspan="4">No Saved Menu</th>
														
													</tr>
												@endforelse
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card dashboard-table">
									<div class="card-body">
										<h3>Saved Meals</h3>
										<table class="table mb-0 text-left">
											<thead>
												<tr>
													<th scope="col">image</th>
													<th scope="col">product name</th>
													<th scope="col">Day/Period</th>
													<th scope="col">price</th>
													
												</tr>
											</thead>
											<tbody>
												@forelse ($user->bookmarks->where('eatable_type','App\Meal') as $meal)
													<tr>
														<th scope="row">
															@if(!$meal->eatable->media)
																<img src="{{asset('img/no-image.jpg')}}" alt="{{$meal->eatable->name}}" class="blur-up lazyloaded">
																@else
																<img src="{{asset('storage/meals/'.$meal->eatable->media->name)}}" alt="{{$meal->eatable->name}}" class="blur-up lazyloaded">
															@endif
														</th>
														<td>{{$meal->eatable->name}}</td>
														<td>{{$meal->eatable->day.' :'.$meal->eatable->period}}</td>
														<td>₦{{$meal->eatable->price}}</td>
														
													</tr>
												@empty
													<tr>
														<th colspan="4">No Saved Meal</th>
														
													</tr>
												@endforelse
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="tab-pane fade" id="orders">
						<div class="row">
							<div class="col-md-12">
								<div class="card dashboard-table mt-0">
									<div class="card-body">
										<div class="top-sec">
											<h3>Orders</h3>
											{{-- <a href="#" class="btn btn-sm btn-solid">add product</a> --}}
										</div>
										<table class="table-responsive-md table mb-0 text-left">
											<thead>
												<tr>
													<th scope="col">Date</th>
													<th scope="col">Items </th>
													<th scope="col">Deliveries</th>
													<th scope="col">Amount</th>
													<th scope="col">Delivery</th>
													<th scope="col">Status</th>
													<th scope="col">edit/delete</th>
												</tr>
											</thead>
											<tbody>
												@forelse ($user->orders as $order)
												<tr>
													<td>{{$order->created_at->format('M-jS')}}</td>
													<td>{{$order->details->count()}} items</td>
													<td>{{$order->deliveries->count()}}</td>
													<td>₦{{$order->amount}}</td>
													<td>{{($order->delivered_at) ? $order->delivered_at->format('d.m.y h:i:A'):''}}</td>
													<td>{{$order->status}}</td>
													<td>
														<a href="{{route('user.order.show',$order)}}" class="text-primary">
															<i class="fa fa-eye mr-1" aria-hidden="true"></i>View
														</a>|
														<a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#delete-order{{$order->id}}">
															<i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
														</a>
														<div class="modal fade modal-primary" id="delete-order{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-order{{$order->id}}" aria-hidden="true">
															<div class="modal-dialog modal-sm">
																<div class="modal-content ">
																	<div class="modal-header justify-content-center">
																			<p>Delete Order</p>																		
																	</div>
																	<div class="modal-body text-center">
																		<p>Are you sure you want to delete this order</p>
																		<form class="d-inline" action="{{route('user.order.delete',$order)}}" method="POST">@csrf
																			<button type="submit" class="btn btn-danger">Yes</button>
																		</form>
																		<button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
																	</div>
																	
																</div>
															</div>
														</div>
													</td>
												</tr>
												@empty
													<tr><td colspan="7">No Order</td></tr>
												@endforelse
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="transactions">
						<div class="row">
							<div class="col-md-12">
								<div class="card dashboard-table mt-0">
									<div class="card-body">
										<div class="top-sec">
											<h3>Transactions</h3>
											{{-- <a href="#" class="btn btn-sm btn-solid">add product</a> --}}
										</div>
										<table class="table table-responsive-sm mb-0 text-left">
											<thead>
												<tr>
													<th scope="col">Date</th>
													<th scope="col">Order</th>
													<th scope="col">payment method</th>
													<th scope="col">status</th>
													<th scope="col">amount</th>
												</tr>
											</thead>
											<tbody>
												@forelse ($user->payments as $payment)
												<tr>
													<td>{{$payment->created_at->format('M-jS')}}</td>
													<td><a href="{{route('user.order.show',$payment->order)}}">View Order</a></td>
													<td>{{$payment->method}}</td>
													<td>{{$payment->status}}</td>
													<td>₦{{$payment->amount}}</td>
													
												</tr>
												@empty
													<tr><td colspan="7">No Transaction</td></tr>
												@endforelse
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="tab-pane fade" id="preferences">
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
					<div class="tab-pane fade" id="profile">
						<div class="row">
							<div class="col-md-12">
								<div class="card mt-0">
									<div class="card-body">
										<div class="dashboard-box">
											<div class="dashboard-title">
												<h4>profile</h4>
												
											</div>
											<div class="row my-5">
												<form class="mt-5" action="{{route('user.profile')}}" method="POST" enctype="multipart/form-data">@csrf
													<div class="col-md-12 d-flex flex-column flex-md-row">
														<div class="d-flex flex-column flex-md-row">
															<div class="text-center">
																<img @if($user->media) src="{{asset('storage/users/'.$user->media->name)}}" @else src="{{asset('img/no-image.jpg')}}" @endif class="avatar rounded my-0" width="200px" height="200px" id="featured">
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
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection
@push('scripts')
	<script>
		$(document).on('click','.remove-from-wish',function(){
            var item = $(this).attr('data-item');
            var item_id = parseInt($(this).attr('data-item_id'));
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('user.bookmark.remove')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id,
                    'item': item
                },
                success:function(data) {
                  alert('success');
                    // $('#cart-notification').html(data.cart_count);
                    // $('#cart-notification,.shopping-cart').show();
                    // var cart_total = 0;
                    // var listing;
                    // $('#shopping_list').html('');
                    // $.each( data.cart, function( key, value ) {
                    //     listing =  `<li  id="cartlist`+key+`">
                    //                     <div class="media">
                    //                         <a href="#">
                    //                             <img alt="" class="mr-3"
                    //                                 src="/storage/media/image/`+value['image']+`">
                    //                         </a>
                    //                         <div class="media-body">
                    //                             <a href="#">
                    //                                 <h4>`+value['name']+`</h4>
                    //                             </a>
                    //                             <h4><span>`+value['quantity']+` x `+value['amount']+`</span></h4>
                    //                         </div>
                    //                     </div>
                    //                     <div class="close-circle">
                    //                         <a href="javascript:void(0)" class="remove-from-cart" data-product="`+key+`product"><i class="fa fa-times" aria-hidden="true"></i></a>
                    //                     </div>
                    //                 </li>`;
                    //     cart_total += parseInt(value['quantity']) * parseInt(value['amount']);
                    //     $('#shopping_list').prepend(listing);
                    // });
                    // $('#cart_total').html(cart_total);
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });
	</script>
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
