@extends('frontend.layouts.app')
@section('main')

  
  <!-- Restaurant Menu Section -->
<div id="restaurant-menu">
	<div class="container"> 
		<div class="section-title text-center">
		  <h2>Meals</h2>
		</div>
		
		<div class="row" id="menuq">
            <div class="col-sm-4 col-md-3 mb-2 slidenav py-3 py-sm-0">
				<form id="search" action="{{route('menus')}}" method="GET">
					<div class="well">
					  <div class="row">
					  <div class="col-sm-12">
						<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="Search menu item...">
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
				<form class="shop__filter" action="{{route('menus')}}" method="GET">
					<!-- Checkboxes -->
					<h3 class="headline">
					  <span>Type</span>
					</h3>
					<div class="checkbox">
					  <input type="checkbox" class="category" name="category[]" value="food" id="food" @if(in_array('food',$filter['category'])) checked @endif>
					  <label for="food">Food</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="category" name="category[]" value="drinks" id="drinks" @if(in_array('drinks',$filter['category'])) checked @endif>
					  <label for="drinks">Drinks</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="category" name="category[]" value="fruits" id="fruits" @if(in_array('fruits',$filter['category'])) checked @endif>
					  <label for="fruits">Fruits</label>
					</div></br>
					<div class="checkbox">
					  <input type="checkbox" class="category" name="category[]" value="pastries" id="pastries" @if(in_array('pastries',$filter['category'])) checked @endif>
					  <label for="pastries">Pastries</label>
					</div>
					<br>
				
					<h3 class="headline">
					  <span>Sizes</span>
					</h3>
					<div class="radio">
					  <input type="radio" name="size"  id="shop-filter-price_1" value="small" @if($filter['size'] == 'small') checked @endif>
					  <label for="shop-filter-price_1">Small</label>
					</div></br>
					<div class="radio">
					  <input type="radio" name="size" id="shop-filter-price_2" value="medium" @if($filter['size'] == 'medium') checked @endif>
					  <label for="shop-filter-price_2">Medium</label>
					</div></br>
					<div class="radio">
					  <input type="radio" name="size" id="shop-filter-price_3" value="large" @if($filter['size'] == 'large') checked @endif>
					  <label for="shop-filter-price_3">Large</label>
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
					  <br>
					<button type="submit" class="btn btn-default btn-block">Filter</button>
				
				</form>
				
			</div>
			
			<div class="col-sm-8 col-md-9">	
				<div class="row list-wrapper">
				  @forelse ($menus as $menu)
					<div class="col-sm-6 col-md-4 list-item grid">
					  <div class="product">
						<figure>
						 
						  <img src="{{$menu->image}}" alt="{{$menu->name}}">
						
						</figure>
						<section class="details">
						  <div class="min-details">
							<h5>{{$menu->name}}<span>{{$menu->size}}</span></h5>
							<h5 class="price">₦{{$menu->price}}</h5>
						  </div>
						  <div class="options">
							<div class="options-size">
							  <span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Description</span>	
							</div>
							<div class="options-colors">
							  <span>{{$menu->description}}</span> 		
							</div>
							
						  </div>
						  <div class="d-flex">
							<a href="javascript:void(0)" class="btn btn-primary mr-2 add-to-cart" data-item="App\Menu" data-item_id="{{$menu->id}}"><i class="fa fa-shopping-cart pr-1"></i>Add to Cart</a>
							
							<a target="_blank" href="https://wa.me/2349058271973?text=I%20want%20to%20buy%20item%20-%20menu%20{{$menu->id}}" class="btn btn-primary mr-2">Order Now</a>
							@auth
							<a href="javascript:void(0)" class="btn btn-dark add-to-wish" data-item="App\Menu" data-item_id="{{$menu->id}}"><i class="fa fa-heart pr-1"></i>Save</a>
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
				$('.cart-count').html(data.cart_count);
				$('.cart-count,.pulse').show();
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
