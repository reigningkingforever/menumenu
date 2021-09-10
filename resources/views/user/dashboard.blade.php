@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-centers">
	<div class="container">
	  	<div class="section-title">
			<h2>DASHBOARD</h2>
	  	</div>
		  <div class="row">
			<div class="col-lg-3 text-center">
				@include('user.menu')
			</div>
			<div class="col-lg-9">
				<div class="faq-content">
					<div class="counter-section">
						<div class="row text-center">
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
									<h3>Saved Meals</h3>
									<table class="table mb-0 text-left">
										<thead>
											<tr>
												<th scope="col">image</th>
												<th scope="col">product name</th>
												<th scope="col">Next Routine</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($user->bookmarks as $bookmark)
												<tr>
													<th scope="row">
														@if(!$bookmark->calendar->meal->image)
															<img src="{{asset('img/no-image.jpg')}}" alt="{{$bookmark->calendar->meal->name}}" class="blur-up lazyloaded">
														@else
															<img src="{{$bookmark->calendar->meal->image}}" alt="{{$bookmark->calendar->meal->name}}" class="blur-up lazyloaded">
														@endif
													</th>
													<td>{{$bookmark->calendar->meal->name}}</td>
													<td>{{$bookmark->calendar->meal->calendars->sortByDesc('start_at')->first()->day.''.$bookmark->calendar->meal->calendars->sortByDesc('start_at')->first()->start_at->format('jS').' :'.$bookmark->calendar->meal->calendars->sortByDesc('start_at')->first()->period}}</td>
													
													
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
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<h3 class="text-center">Feeds</h3>
									<ul class="feeds">
										<li>
											<div class="bg-primary"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span>
										</li>
										<li>
											<div class="bg-success"><i class="fa fa-server"></i></div> Server #1 overloaded.<span class="text-muted">2 Hours ago</span>
										</li>
										<li>
											<div class="bg-warning"><i class="fa fa-shopping-cart"></i></div> New order received.<span class="text-muted">31 May</span>
										</li>
										<li>
											<div class="bg-danger"><i class="fa fa-user"></i></div> New user registered.<span class="text-muted">30 May</span>
										</li>
										<li>
											<div class="bg-primary"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span>
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
