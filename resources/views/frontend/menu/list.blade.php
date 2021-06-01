<div class="col-sm-8 col-md-9">	
	<div class="row list-wrapper">
	  @forelse ($menus as $menu)
		<div class="col-sm-6 col-md-4 list-item grid">
		  <div class="product">
			<figure>
			  @if(!$menu->media)
			  <img src="{{asset('img/no-image.jpg')}}" alt="{{$menu->name}}">
			  @else
			  <img src="{{asset('storage/meals/'.$menu->media->name)}}" alt="{{$menu->title}}">
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
			  <a href="#" class="btn">order now</a>
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