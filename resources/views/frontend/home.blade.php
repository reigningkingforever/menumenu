@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
  <div id="features" class="text-center">
    <div class="container">
      <div class="section-title">
        <h2>What we do</h2>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <a href="{{route('meals')}}"><h3>Meal Routine Subscription</h3></a>
            <img src="{{asset('img/specials/1.jpg')}}" class="img-responsive" alt="">
            <p>Tired of eating the same kind of meals everyday? Join our daily delivery of various kinds of cooked breakfast, lunch and dinner, for a complete nutritional value.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Home Cooking / Delivery</h3>
            <img src="{{asset('img/specials/2.jpg')}}" class="img-responsive" alt="">
            <p>We routinely supply several sets of cooked meals and soup that will last you for short periods of time. Meals are either cooked at your home or delivered.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Food Stuff Purchase</h3>
            <img src="{{asset('img/specials/3.jpg')}}" class="img-responsive" alt="">
            <p>Want to follow Lara's Menu and still cook them yourself? We can help you get all kinds of food stuffs and ingredients and deliver to your home at your convenience.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Cake and Pastries</h3>
            <img src="{{asset('img/specials/1.jpg')}}" class="img-responsive" alt="">
            <p>Tired of eating the same kind of meals everyday? Join our daily delivery of various kinds of cooked breakfast, lunch and dinner, for a complete nutritional value.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Event Catering</h3>
            <img src="{{asset('img/specials/2.jpg')}}" class="img-responsive" alt="">
            <p>We routinely supply several sets of cooked meals and soup that will last you for short periods of time. Meals are either cooked at your home or delivered.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Trainings</h3>
            <img src="{{asset('img/specials/3.jpg')}}" class="img-responsive" alt="">
            <p>Want to follow Lara's Menu and still cook them yourself? We can help you get all kinds of food stuffs and ingredients and deliver to your home at your convenience.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About Section -->
  <div id="about">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6 about-img"> </div>
        <div class="col-xs-12 col-md-3 col-md-offset-1">
          <div class="about-text">
            <div class="section-title">
              <h2>Our Story</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Gallery Section -->
  <div id="gallery">
    <div class="container-fluid">
      <div class="owl-carousel nonloop-block-13">
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/01.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Door to Door Delivery</h3>
                <p class="px-5">We keep the convenience of our clients to be of paramount important, therefore we will deliver parcels to you at your specified convenience.</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/02.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Cold Courier Service</h3>
                <p class="px-5">We have special delivery boxes for carrying items that need to be transported at low temperatures.</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/03.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Food Delivery</h3>
                <p class="px-5">We courier food to any location, keeping the temperature of the food nearly the same while in transit .</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/04.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Medical Delivery</h3>
                <p class="px-5">Deliverying medical items between doctors and patients, blood banks, hospitals and pharmacies is one of our major specialties.</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/05.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Packaging and Branding</h3>
                <p class="px-5">Our e-commerce partners often leave their packaging materials with us to hasten the delivery process of products to their customers.</p>
              </div>
            </a>
          </div>
          
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/06.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Cash on Delivery</h3>
                <p class="px-5">We collect cash on behalf of our clients who offer this service to their customers. We have no record of settlement hassles</p>
              </div>
            </a>
          </div>
          
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/07.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Goods Transportation</h3>
                <p class="px-5">We deliver goods all over the country from farm to markets, markets to distributors and retailers, and individual bulk purchases.</p>
              </div>
            </a>
          </div>
      </div>
       
      <!-- 
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <div class="gallery-item"> <img src="{{asset('img/gallery/01.jpg')}}" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="gallery-item"> <img src="{{asset('img/gallery/02.jpg')}}" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="gallery-item"> <img src="{{asset('img/gallery/03.jpg')}}" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="gallery-item"> <img src="{{asset('img/gallery/04.jpg')}}" class="img-responsive" alt=""></div>
            </div>
          </div>
      -->
          
      </div>
  </div>
  
  <!-- Restaurant Menu Section -->
  <div id="restaurant-menu">
      <div class="container"> 
          <div class="section-title text-center">
            <h2>Menu</h2>
          </div>
          
          <div class="row" id="menuq">
            <div class="col-sm-4 col-md-3 mb-2">
              <form class="shop_menu" id="shop_search" method="POST">
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
              <form class="shop_menu" id="shop_filter" method="POST">
                <!-- Checkboxes -->
                <h3 class="headline">
                  <span>Type</span>
                </h3>
                <div class="checkbox">
                  <input type="checkbox" class="itemtype" name="itemtype[]" value="food" id="food" @if(in_array('food',$filter['itemtype'])) checked @endif>
                  <label for="food">Food</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="itemtype" name="itemtype[]" value="drinks" id="drinks" @if(in_array('drinks',$filter['itemtype'])) checked @endif>
                  <label for="drinks">Drinks</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="itemtype" name="itemtype[]" value="fruits" id="fruits" @if(in_array('fruits',$filter['itemtype'])) checked @endif>
                  <label for="fruits">Fruits</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="itemtype" name="itemtype[]" value="pastries" id="pastries" @if(in_array('pastries',$filter['itemtype'])) checked @endif>
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
            <div id="menu_result">
              @include('frontend.menu.list')

            </div>
            
            
          </div>
          
      </div>  
  </div>
  
  
  
  <!-- Team Section -->
  <div id="subscribe">
    <div class="container">
      <div id="row">
        <div class="col-md-6">
          <div class="col-md-10 col-md-offset-1">
            <div class="section-title">
              <h2>Meet Our Chef</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="team-img"><img src="{{asset('img/chef.jpg')}}" alt="..."></div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Contact Section -->
  <div id="contact" class="text-center">
    <div class="container text-center">
      <div class="col-md-4">
        <h3>Reservations</h3>
        <div class="contact-item">
          <p>Please call</p>
          <p>(887) 654-3210</p>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Address</h3>
        <div class="contact-item">
          <p>4321 California St,</p>
          <p>San Francisco, CA 12345</p>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Opening Hours</h3>
        <div class="contact-item">
          <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
          <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
        </div>
      </div>
    </div>
    {{-- <div class="container">
      <div class="section-title text-center">
        <h3>Send us a message</h3>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
      </div>
    </div> --}}
  </div>
  
@endsection
@push('scripts')
{{-- <script type="text/javascript" src="{{asset('js/jquery.3.2.min.js')}}"></script>  --}}
    <script>
        $('.shop_menu').submit(function(e){
            e.preventDefault();
            var search = '';
            if($(this).attr('id') =="shop_search")
                search = $('input[name="search"]').val();
            else $('input[name="search"]').val('');
            var itemtype = [];
            $('.itemtype:checked').each(function(index){ itemtype.push($(this).val()); });
            var origin = [];
            $('.origin:checked').each(function(index){ origin.push($(this).val()); });
            var diet = [];
            $('.diet:checked').each(function(index){ diet.push($(this).val()); });
            var size = $('input[name="size"]:checked').val();
            //alert(search)
            $.ajax({
                type:'POST',
                dataType: 'html',
                url: "{{route('menus')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'search': search,
                    'itemtype': itemtype,
                    'origin': origin,
                    'diet': diet,
                    'size': size
                },
                success:function(data) {
                    $('#menu_result').html(data);
    
          
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
                complete: function() {
                    $.getScript("{{asset('js/jquery.simplePagination.js')}}", function() {
                      $.getScript("{{asset('js/paginate-script.js')}}", function() {
                        //alert('loaded script and content');
                      });
                    });
                    // paginate.init();
                }
            });
        });
    </script>
    <script>
      $('.itemtype').click(function(){
          if($('.itemtype:checked').length < 1)
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