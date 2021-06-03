@extends('frontend.layouts.app')
@section('main')

  
  <!-- Restaurant Menu Section -->
<div id="restaurant-menu">
	<div class="container"> 
		<div class="section-title text-center">
		  <h2>Meals</h2>
		</div>
		
		<div class="row">
			<div class="col-sm-4 col-md-3 mb-2">
				<form id="search" action="{{route('meals')}}" method="GET">
					<div class="well">
					  <div class="row">
						<div class="col-sm-12">
						  <div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Search meal...">
							<span class="input-group-btn">
							  <button class="btn btn-primary" type="submit">
								<i class="fa fa-search"></i>
							  </button>
							</span>
						  </div>
						</div>
					  </div>
					</div>
				</form>

			  <!-- Filter -->
				<form class="shop__filter" action="{{route('meals')}}" method="GET">
					<input name="filter" value="true" type="hidden">
					<!-- Checkboxes -->
					<h3 class="headline">
					  <span>Period</span>
					</h3>
					<div class="checkbox">
					  <input type="checkbox" class="foodtype" name="period[]" value="breakfast" id="breakfast" @if(in_array('breakfast',$filter['period'])) checked @endif>
					  <label for="breakfast">Breakfast</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="foodtype" name="period[]" value="lunch" id="lunch" @if(in_array('lunch',$filter['period'])) checked @endif>
					  <label for="lunch">Lunch</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="foodtype" name="period[]" value="dinner" id="dinner" @if(in_array('dinner',$filter['period'])) checked @endif>
					  <label for="dinner">Dinner</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="foodtype" name="period[]" value="dessert" id="dessert" @if(in_array('dessert',$filter['period'])) checked @endif>
					  <label for="dessert">Dessert</label>
					</div></br>

					<h3 class="headline">
						<span>Diet Type</span>
					</h3>
					<div class="checkbox">
						<input type="checkbox" class="diet" name="diet[]" value="vegan" id="vegan" @if(in_array('vegan',$filter['diet'])) checked @endif>
						<label for="vegan">Vegan</label>
					</div></br>
					<div class="checkbox">
						<input type="checkbox" class="diet" name="diet[]" value="veg" id="veg" @if(in_array('veg',$filter['diet'])) checked @endif>
						<label for="veg">Vegetarian</label>
					</div></br>
					<div class="checkbox">
						<input type="checkbox" class="diet" name="diet[]" value="nonveg" id="nonveg" @if(in_array('nonveg',$filter['diet'])) checked @endif>
						<label for="nonveg">Non Vegetarian</label>
					</div></br>
					<!-- Radios -->
					<h3 class="headline">
						<span>Origin</span>
					</h3>
					<div class="checkbox">
						  <input class="origin" type="checkbox" name="origin[]" id="local" value="local" @if(in_array('local',$filter['origin'])) checked @endif>
						  <label for="local">Local Dish</label>
					</div></br>
					<div class="checkbox">
						<input class="origin" type="checkbox" name="origin[]" id="intercontinental" value="intercontinental" @if(in_array('intercontinental',$filter['origin'])) checked @endif>
						<label for="intercontinental">Intercontinental</label>
				  	</div></br>
					<div class="checkbox">
						<input class="origin" type="checkbox" name="origin[]" id="chinese" value="chinese" @if(in_array('chinese',$filter['origin'])) checked @endif>
						<label for="chinese">Chinese</label>
				  	</div></br>
					  <div class="checkbox">
						<input class="origin" type="checkbox" name="origin[]" id="italian" value="italian" @if(in_array('italian',$filter['origin'])) checked @endif>
						<label for="italian">Italian</label>
				  	</div></br>

					<!-- Price -->
					
					<h3 class="headline">
						<span>Price</span>
					</h3>
					<div class="radio">
						<input type="radio" name="price"  id="shop-filter-price_1" value="0,500" @if($filter['cost'] == '0,500') checked @endif>
						<label for="shop-filter-price_1">Under ₦500</label>
					</div></br>
					<div class="radio">
						<input type="radio" name="price" id="shop-filter-price_2" value="501,1000" @if($filter['cost'] == '501,1000') checked @endif>
						<label for="shop-filter-price_2">₦500 to ₦1000</label>
					</div></br>
					<div class="radio">
						<input type="radio" name="price" id="shop-filter-price_3" value="1001,2000" @if($filter['cost'] == '1001,2000') checked @endif>
						<label for="shop-filter-price_3">₦1000 to ₦2000</label>
					</div></br>
					<div class="radio">
						<input type="radio" name="price" id="shop-filter-price_4" value="2001,3000" @if($filter['cost'] == '2001,3000') checked @endif>
						<label for="shop-filter-price_4">₦2000 to ₦3000</label>
					</div></br>
					<div class="radio">
						<input type="radio" name="price" id="shop-filter-price_5" value="3001,4000" @if($filter['cost'] == '3001,4000') checked @endif>
						<label for="shop-filter-price_5">₦3000 to ₦4000</label>
					</div></br>
					<div class="radio">
						<input type="radio" name="price" id="shop-filter-price_6" value="4001,10000" @if($filter['cost'] == '4001,10000') checked @endif>
						<label for="shop-filter-price_6">Above 4000</label>
					</div></br>
					

					
					
					  <br>
					<button type="submit" class="btn btn-default btn-block">Filter</button>

				</form>
			</div>
			
			<div class="col-sm-8 col-md-9">
			  	<!-- Filters -->
				<ul class="shop__sorting">
					<li class="active"><a data-toggle="tab" href="#monday">Monday</a></li>
					<li><a data-toggle="tab" href="#tuesday">Tuesday</a></li>
					<li><a data-toggle="tab" href="#wednesday">Wednesday</a></li>
					<li><a data-toggle="tab" href="#thursday">Thursday</a></li>
					<li><a data-toggle="tab" href="#friday">Friday</a></li>
					<li><a data-toggle="tab" href="#saturday">Saturday</a></li>
					<li><a data-toggle="tab" href="#sunday">Sunday</a></li>
				</ul>
				<div class="tab-content">
					<div id="monday" class="tab-pane fade in active">
						<div class="row list-wrapper">
                            @forelse ($meals->where('day','monday') as $monday)
                                <div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$monday->period}}" data-cost="{{$monday->price}}">
                                    <div class="product">
                                        <figure>
											@if(!$monday->media)
                                            <img src="{{asset('img/no-image.jpg')}}" alt="{{$monday->title}}">
											@else
                                            <img src="{{asset('storage/meals/'.$monday->media->name)}}" alt="{{$monday->title}}">
											@endif
                                        </figure>
                                        <section class="details">
                                            <div class="min-details">
                                                <h5>{{$monday->title}}<span>{{$monday->subtitle}}</span></h5>
                                                <h5 class="price">₦{{$monday->price}}</h5>
                                            </div>
                                            <div class="options">
                                                <div class="options-size">
                                                    <span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
                                                </div>
                                                <div class="options-colors">
													@foreach ($monday->items as $item)
														
														 <span>{{$item->name}}</span> 
														 @if(!$loop->last)+ @endif
													@endforeach
                                                    
														
                                                </div>
                                                
                                            </div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$monday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$monday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
					
					<div id="tuesday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','tuesday') as $tuesday)
                                <div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$tuesday->period}}" data-cost="{{$tuesday->price}}">
                                    <div class="product">
                                        <figure>
											@if(!$tuesday->media)
                                            <img src="{{asset('img/no-image.jpg')}}" alt="{{$tuesday->title}}">
											@else
                                            <img src="{{asset('storage/meals/'.$tuesday->media->name)}}" alt="{{$tuesday->title}}">
											@endif
                                        </figure>
                                        <section class="details">
                                            <div class="min-details">
                                                <h5>{{$tuesday->title}}<span>{{$tuesday->subtitle}}</span></h5>
                                                <h5 class="price">₦{{$tuesday->price}}</h5>
                                            </div>
                                            <div class="options">
                                                <div class="options-size">
                                                    <span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
                                                </div>
                                                <div class="options-colors">
													@foreach ($tuesday->meals as $item)
														
														 <span>{{$item->name}}</span> 
														 @if(!$loop->last)+ @endif
													@endforeach
                                                    
														
                                                </div>
                                                
                                            </div>
                                            <div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$tuesday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$tuesday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  </div> <!-- / .row -->
					</div>
					
					<div id="wednesday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','wednesday') as $wednesday)
								<div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$wednesday->period}}" data-cost="{{$wednesday->price}}">
									<div class="product">
										<figure>
											@if(!$wednesday->media)
											<img src="{{asset('img/no-image.jpg')}}" alt="{{$wednesday->title}}">
											@else
											<img src="{{asset('storage/meals/'.$wednesday->media->name)}}" alt="{{$wednesday->title}}">
											@endif
										</figure>
										<section class="details">
											<div class="min-details">
												<h5>{{$wednesday->title}}<span>{{$wednesday->subtitle}}</span></h5>
												<h5 class="price">₦{{$wednesday->price}}</h5>
											</div>
											<div class="options">
												<div class="options-size">
													<span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
												</div>
												<div class="options-colors">
													@foreach ($wednesday->meals as $item)
														
														<span>{{$item->name}}</span> 
														@if(!$loop->last)+ @endif
													@endforeach
													
														
												</div>
												
											</div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$wednesday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$wednesday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  
					</div>
					
					<div id="thursday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','thursday') as $thursday)
								<div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$thursday->period}}" data-cost="{{$thursday->price}}">
									<div class="product">
										<figure>
											@if(!$thursday->media)
											<img src="{{asset('img/no-image.jpg')}}" alt="{{$thursday->title}}">
											@else
											<img src="{{asset('storage/meals/'.$thursday->media->name)}}" alt="{{$thursday->title}}">
											@endif
										</figure>
										<section class="details">
											<div class="min-details">
												<h5>{{$thursday->title}}<span>{{$thursday->subtitle}}</span></h5>
												<h5 class="price">₦{{$thursday->price}}</h5>
											</div>
											<div class="options">
												<div class="options-size">
													<span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
												</div>
												<div class="options-colors">
													@foreach ($thursday->meals as $item)
														
														<span>{{$item->name}}</span> 
														@if(!$loop->last)+ @endif
													@endforeach
													
														
												</div>
												
											</div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$thursday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$thursday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  
					</div>
					
					<div id="friday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','friday') as $friday)
								<div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$friday->period}}" data-cost="{{$friday->price}}">
									<div class="product">
										<figure>
											@if(!$friday->media)
											<img src="{{asset('img/no-image.jpg')}}" alt="{{$friday->title}}">
											@else
											<img src="{{asset('storage/meals/'.$friday->media->name)}}" alt="{{$friday->title}}">
											@endif
										</figure>
										<section class="details">
											<div class="min-details">
												<h5>{{$friday->title}}<span>{{$friday->subtitle}}</span></h5>
												<h5 class="price">₦{{$friday->price}}</h5>
											</div>
											<div class="options">
												<div class="options-size">
													<span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
												</div>
												<div class="options-colors">
													@foreach ($friday->meals as $item)
														
														<span>{{$item->name}}</span> 
														@if(!$loop->last)+ @endif
													@endforeach
													
														
												</div>
												
											</div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$friday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$friday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  
					</div>
					
					<div id="saturday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','saturday') as $saturday)
								<div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$saturday->period}}" data-cost="{{$saturday->price}}">
									<div class="product">
										<figure>
											@if(!$saturday->media)
											<img src="{{asset('img/no-image.jpg')}}" alt="{{$saturday->title}}">
											@else
											<img src="{{asset('storage/meals/'.$saturday->media->name)}}" alt="{{$saturday->title}}">
											@endif
										</figure>
										<section class="details">
											<div class="min-details">
												<h5>{{$saturday->title}}<span>{{$saturday->subtitle}}</span></h5>
												<h5 class="price">₦{{$saturday->price}}</h5>
											</div>
											<div class="options">
												<div class="options-size">
													<span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
												</div>
												<div class="options-colors">
													@foreach ($saturday->meals as $item)
														
														<span>{{$item->name}}</span> 
														@if(!$loop->last)+ @endif
													@endforeach
													
														
												</div>
												
											</div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$saturday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$saturday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  
					</div>
					
					<div id="sunday" class="tab-pane fade in">
						<div class="row list-wrapper">
							@forelse ($meals->where('day','sunday') as $sunday)
								<div class="col-sm-6 col-md-4 list-item grid" data-foodtype="{{$sunday->period}}" data-cost="{{$sunday->price}}">
									<div class="product">
										<figure>
											@if(!$sunday->media)
											<img src="{{asset('img/no-image.jpg')}}" alt="{{$sunday->title}}">
											@else
											<img src="{{asset('storage/meals/'.$sunday->media->name)}}" alt="{{$sunday->title}}">
											@endif
										</figure>
										<section class="details">
											<div class="min-details">
												<h5>{{$sunday->title}}<span>{{$sunday->subtitle}}</span></h5>
												<h5 class="price">₦{{$sunday->price}}</h5>
											</div>
											<div class="options">
												<div class="options-size">
													<span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
												</div>
												<div class="options-colors">
													@foreach ($sunday->meals as $item)
														
														<span>{{$item->name}}</span> 
														@if(!$loop->last)+ @endif
													@endforeach
													
														
												</div>
												
											</div>
											<div class="d-flex">
                                            	<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Meal" data-item_id="{{$sunday->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
												@auth
                                            	<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Meal" data-item_id="{{$sunday->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
						  	
					</div>
				</div>	
			   
			</div>
		</div>
	</div>  
</div>
  
@endsection
@push('scripts')
<script>
	$('.foodtype').click(function(){
    	if($('.foodtype:checked').length < 1)
		$(this).prop('checked', true);
	});
	$('.origin').click(function(){
    	if($('.origin:checked').length < 1)
		$(this).prop('checked', true);
	});
	$('.diet').click(function(){
          if($('.diet:checked').length < 1)
        $(this).prop('checked', true);
    });
</script>
<script>
	$(document).on('click','.add-to-cart',function(){
		var item = $(this).attr('data-item');
		var item_id = parseInt($(this).attr('data-item_id'));
		$.ajax({
			type:'POST',
			dataType: 'json',
			url: "{{route('cart.add')}}",
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
	$(document).on('click','.add-to-wish',function(){
	  var item = $(this).attr('data-item');
	  var item_id = parseInt($(this).attr('data-item_id'));
		$.ajax({
			type:'POST',
			dataType: 'json',
			url: "{{route('user.bookmark.add')}}",
			data:{
				'_token' : $('meta[name="csrf-token"]').attr('content'),
				'item_id': item_id,
				'item': item
			},
			success:function(data) {
			  alert('success');
				// $('#wish_counter').html(data.wish_count);
				// $('#wish_counter').show();
			},
			error: function (data, textStatus, errorThrown) {
			console.log(data);
			},
		});
	});
</script>
@endpush
