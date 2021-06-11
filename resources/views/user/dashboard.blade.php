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
											<h3>25</h3>
											<h5>total Saved</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-box">
										<img src="{{asset('img/sale.png')}}" class="img-fluid">
										<div>
											<h3>50</h3>
											<h5>total Orders</h5>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="counter-box">
										<img src="{{asset('img/homework.png')}}" class="img-fluid">
										<div>
											<h3>12500</h3>
											<h5>total spent</h5>
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
										<table class="table mb-0">
											<thead>
												<tr>
													<th scope="col">image</th>
													<th scope="col">product name</th>
													<th scope="col">price</th>
													<th scope="col">sales</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>neck velvet dress</td>
													<td>₦205</td>
													<td>1000</td>
												</tr>
												<tr>
													<th scope="row"><img
															src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>belted trench coat</td>
													<td>₦350</td>
													<td>800</td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>man print tee</td>
													<td>₦150</td>
													<td>750</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card dashboard-table">
									<div class="card-body">
										<h3>Saved Meals</h3>
										<table class="table mb-0">
											<thead>
												<tr>
													<th scope="col">image</th>
													<th scope="col">product name</th>
													<th scope="col">price</th>
													<th scope="col">sales</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>neck velvet dress</td>
													<td>₦205</td>
													<td>1000</td>
												</tr>
												<tr>
													<th scope="row"><img
															src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>belted trench coat</td>
													<td>₦350</td>
													<td>800</td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>man print tee</td>
													<td>₦150</td>
													<td>750</td>
												</tr>
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
										<table class="table-responsive-md table mb-0">
											<thead>
												<tr>
													<th scope="col">image</th>
													<th scope="col">product name</th>
													<th scope="col">category</th>
													<th scope="col">price</th>
													<th scope="col">stock</th>
													<th scope="col">sales</th>
													<th scope="col">edit/delete</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row"><img
															src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>neck velvet dress</td>
													<td>women clothes</td>
													<td>₦205</td>
													<td>1000</td>
													<td>2000</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
												<tr>
													<th scope="row"><img
															src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>belted trench coat</td>
													<td>women clothes</td>
													<td>₦350</td>
													<td>800</td>
													<td>350</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>men print tee</td>
													<td>men clothes</td>
													<td>₦150</td>
													<td>750</td>
													<td>150</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>woman print tee</td>
													<td>women clothes</td>
													<td>₦150</td>
													<td>750</td>
													<td>150</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>men print tee</td>
													<td>men clothes</td>
													<td>₦150</td>
													<td>750</td>
													<td>150</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
												<tr>
													<th scope="row"><img src="{{asset('img/meal-no-image.jpg')}}"
															class="blur-up lazyloaded"></th>
													<td>men print tee</td>
													<td>men clothes</td>
													<td>₦150</td>
													<td>750</td>
													<td>150</td>
													<td><i class="fa fa-pencil-square-o mr-1"
															aria-hidden="true"></i><i class="fa fa-trash-o ml-1"
															aria-hidden="true"></i></td>
												</tr>
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
										<table class="table table-responsive-sm mb-0">
											<thead>
												<tr>
													<th scope="col">order id</th>
													<th scope="col">product details</th>
													<th scope="col">status</th>
													<th scope="col">price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">#125021</th>
													<td>neck velvet dress</td>
													<td>shipped</td>
													<td>₦205</td>
												</tr>
												<tr>
													<th scope="row">#521214</th>
													<td>belted trench coat</td>
													<td>shipped</td>
													<td>₦350</td>
												</tr>
												<tr>
													<th scope="row">#521021</th>
													<td>men print tee</td>
													<td>pending</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#245021</th>
													<td>woman print tee</td>
													<td>shipped</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#122141</th>
													<td>men print tee</td>
													<td>canceled</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#125015</th>
													<td>men print tee</td>
													<td>pending</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#245021</th>
													<td>woman print tee</td>
													<td>shipped</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#122141</th>
													<td>men print tee</td>
													<td>canceled</td>
													<td>₦150</td>
												</tr>
												<tr>
													<th scope="row">#125015</th>
													<td>men print tee</td>
													<td>pending</td>
													<td>₦150</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="preferences">
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
					</div>
					<div class="tab-pane fade" id="profile">
						<div class="row">
							<div class="col-md-12">
								<div class="card mt-0">
									<div class="card-body">
										<div class="dashboard-box">
											<div class="dashboard-title">
												<h4>profile</h4>
												<span data-toggle="modal" data-target="#edit-profile">edit</span>
											</div>
											<div class="dashboard-detail">
												<ul>
													<li>
														<div class="details">
															<div class="left">
																<h6>company name</h6>
															</div>
															<div class="right">
																<h6>Fashion Store</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>email address</h6>
															</div>
															<div class="right">
																<h6>mark.enderess@mail.com</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>Country / Region</h6>
															</div>
															<div class="right">
																<h6>Downers Grove, IL</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>Year Established</h6>
															</div>
															<div class="right">
																<h6>2018</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>Total Employees</h6>
															</div>
															<div class="right">
																<h6>101 - 200 People</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>category</h6>
															</div>
															<div class="right">
																<h6>clothing</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>street address</h6>
															</div>
															<div class="right">
																<h6>549 Sulphur Springs Road</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>city/state</h6>
															</div>
															<div class="right">
																<h6>Downers Grove, IL</h6>
															</div>
														</div>
													</li>
													<li>
														<div class="details">
															<div class="left">
																<h6>zip</h6>
															</div>
															<div class="right">
																<h6>60515</h6>
															</div>
														</div>
													</li>
												</ul>
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
@endpush
