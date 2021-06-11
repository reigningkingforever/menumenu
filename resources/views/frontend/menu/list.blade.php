<div class="col-sm-8 col-md-9">	
	<div class="row list-wrapper">
	  @forelse ($menus as $menu)
		<div class="col-sm-6 col-md-4 list-item grid">
		  <div class="product">
			<figure>
			  @if(!$menu->media)
			  <img src="{{asset('img/no-image.jpg')}}" alt="{{$menu->name}}">
			  @else
			  <img src="{{asset('storage/meals/'.$menu->media->name)}}" alt="{{$menu->name}}">
			  @endif
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