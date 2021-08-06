<div class="col-sm-8 col-md-9">
	<!-- Filters -->
	@php 
		$days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']; 
		$delivery = ['breakfast'=> '07:00 AM','lunch'=>'12:00 noon','dinner'=>'18:00 PM','dessert'=>'12:00 noon']; 
	@endphp
  <ul class="shop__sorting">
	  @foreach ($days as $day)
	  	<li @if(today()->format('l') == $day) class="active" @endif>
			<a data-toggle="tab" href="#{{strtolower($day)}}">{{$day}}</a>
		</li>
	  @endforeach
  </ul>
  <div class="tab-content">
		@foreach ($days as $day)
			<div id="{{strtolower($day)}}" class="tab-pane fade in @if(today()->format('l') == $day)active @endif">
				<div class="row list-wrapper">
					@forelse ($calendars->where('day',strtolower($day)) as $calendar)
						<div class="col-sm-6 col-md-4 list-item grid">
							<div class="product">
								<figure>
									<img src="{{$calendar->meal->image}}" alt="{{$calendar->meal->name}}">
								</figure>
								<section class="details">
									<div class="min-details">
										<h5>{{$calendar->meal->name}}<span>{{$calendar->meal->description}}</span></h5>
										<h5 class="price">₦{{$calendar->meal->price}}</h5>
									</div>
									<div class="options">
										<div class="options-size">
											<span style="font-weight:bold;">Items:</span>
											<span>
												@foreach ($calendar->meal->items as $item)
													<span>{{$item->name}}</span> 
													@if(!$loop->last)+ @endif
												@endforeach
											</span>
										</div>
										<div class="options-colors">
											<span style="font-weight:bold;">Delivery:</span>
											<span>{{ucwords($calendar->period)}} @if($calendar->start_at < now()) Available Now @else {{$calendar->start_at->diffForHumans()}} @endif</span>
										</div>
										
									</div>
									<div class="d-flex">
										<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart"  data-item_id="{{$calendar->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
										{{-- <a target="_blank" href="https://wa.me/2349058271973?text=I%20want%20to%20buy%20item%20-%20meal%20{{$calendar->meal->id}}" class="btn btn-primary mr-2">Order Now</a> --}}
										@auth
										<a href="javascript:void(0)" class="btn btn-dark add-to-wish"  data-item_id="{{$calendar->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
										@endauth
									</div>
									
								</section>
							</div>
						</div>
					@empty
						<div class="col-sm-6 col-md-4 list-item grid">
							<div class="product">
								<figure>
									<img src="{{asset('img/no-image.jpg')}}" alt="`+value.title+`">
								</figure>
								<section class="details">
									<div class="min-details">
										<h5>No Meal<span>No Meal</span></h5>
										<h5 class="price">0</h5>
									</div>
									<div class="options">
										<div class="options-size">
											<span class="font-weight-bold">Items</span>	
										</div>
										<div class="options-colors">
											<span>No items</span>	
										</div>
										
									</div>
									{{-- <a href="#" class="btn">order now</a> --}}
								</section>
							</div>
						</div>
					@endforelse     
				</div> <!-- / .row -->

				<!-- Pagination -->
				<div class="row">
					<div class="col-sm-12">
						<div class="pagination-container"></div> 
					</div>
				</div> 
					<!-- / .row -->
			</div>
		@endforeach	  
  </div>	
 
</div>