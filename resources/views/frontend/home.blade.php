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
            <a href="{{route('meals')}}"><h3>Meal Routine</h3></a>
            <img src="{{asset('img/specials/1.jpg')}}" class="img-responsive" alt="">
            <p>Tired of not knowing what to eat or eating the same kind of meals everyday? Follow our daily meal routine of breakfast, lunch, dinner and desserts</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Home Cooking Service</h3>
            <img src="{{asset('img/specials/2.jpg')}}" class="img-responsive" alt="">
            <p>You can request our highly esteemed cooks to prepare any or all of your choiced meals in your own kitchen at affordable rates.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Food Stuff Purchase</h3>
            <img src="{{asset('img/specials/3.jpg')}}" class="img-responsive" alt="">
            <p>We can assist you with information, purchase and delivery of food stuffs and ingredients necessary to prepare any of the meals on our menu</p>
          </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Cake and Pastries</h3>
            <img src="{{asset('img/specials/1.jpg')}}" class="img-responsive" alt="">
            <p>Contact us for special orders of cakes, small chops, ice-creams, fries, chocolates, pies, doughnuts etc. We always trend in taste</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Event Catering</h3>
            <img src="{{asset('img/specials/2.jpg')}}" class="img-responsive" alt="">
            <p>Contact us to cater your events of different sizes or themes and ceremonies. We have flexible rates that accommodates most people's budget</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="features-item">
            <h3>Trainings</h3>
            <img src="{{asset('img/specials/3.jpg')}}" class="img-responsive" alt="">
            <p>We train interested individuals on  at your convenience.</p>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="container-fluid px-0">
      <div class="owl-carousel nonloop-block-13">
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/01.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Food</h3>
                <p class="px-5">Food consist of 70% of our meal routine. We serve meals of different origin such as local dishes, intercontinental dishes etc...</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/02.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Drinks</h3>
                <p class="px-5">We make and serve special nutritional drinks to accompany your meals. This includes juice, milk shakes, smoodies, tea, etc...</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/03.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Fruits</h3>
                <p class="px-5">Our meal routines are rich in fruits that give you different required vitamins daily, making sure your body get a balanced diet all year round</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/04.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Pastries</h3>
                <p class="px-5">You can also have your sweets, chocolates, cakes, pies etc in between meals as desserts as snacks to enjoy at your leisure time</p>
              </div>
            </a>
          </div>
  
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/05.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Vegetarian Diet</h3>
                <p class="px-5">We have made sure that you can find meals without meat or fish or any kind of animal in our routine. You can go ahead to order meals of you diet type satisfaction from our menu .</p>
              </div>
            </a>
          </div>
          
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/06.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Vegan Diet</h3>
                <p class="px-5">Great care has been taken to make your diet preference our concern. We therefore have meals that neither contain animals nor products of animals. Feel free to explore our menu</p>
              </div>
            </a>
          </div>
          
          <div>
            <a href="#" class="unit-1 text-center">
              <img src="{{asset('img/gallery/07.jpg')}}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Non-Vegetarian</h3>
                <p class="px-5">You can pretty much find anything you desire to eat from our menus. We serve a vast array of beef, chicken, fish, egg etc.. in our meals </p>
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
            <p> Let's face it, you eat the same meals every day & week, and you're tired of that rice routine ain't you?</p>
            <p>DailyMenu is pledged to serve you diversities of meals every week, to make your nutritional experience a healthy, fun and amazing exploration.</p>
            <p>We are pleased to have the privilege of caring about what goes into your mouth. Please follow our weekly menu to order food, drinks, fruits, pastries, etc </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Restaurant Menu Section -->
  <div id="restaurant-menu">
      <div class="container"> 
          <div class="section-title text-center">
            <h2>Menu</h2>
          </div>
          
          <div class="row" id="menuq">
            
            <div class="col-sm-4 col-md-3 mb-2 slidenav py-3 py-sm-0">
              <form class="shop_menu" id="shop_search" method="POST">
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
              <form class="shop_menu" id="shop_filter" method="POST" >
                <input name="filter" value="true" type="hidden">
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
                  <span>Period</span>
                </h3>
                <div class="checkbox">
                  <input type="checkbox" class="period" name="period[]" value="breakfast" id="breakfast" @if(in_array('breakfast',$filter['period'])) checked @endif>
                  <label for="breakfast">Breakfast</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="period" name="period[]" value="lunch" id="lunch" @if(in_array('lunch',$filter['period'])) checked @endif>
                  <label for="lunch">Lunch</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="period" name="period[]" value="dinner" id="dinner" @if(in_array('dinner',$filter['period'])) checked @endif>
                  <label for="dinner">Dinner</label>
                </div></br>
                <div class="checkbox">
                  <input type="checkbox" class="period" name="period[]" value="dessert" id="dessert" @if(in_array('dessert',$filter['period'])) checked @endif>
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
                
                {{-- <h3 class="headline">
                  <span>Price</span>
                </h3>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" value="0" id="shop-filter-price_0" value="0,20000" checked>
                  <label for="shop-filter-price_1">All Prices</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost"  id="shop-filter-price_1" value="0,1000" @if($filter['cost'] == '0,1000') checked @endif>
                  <label for="shop-filter-price_1">Under ₦1000</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" id="shop-filter-price_2" value="1001,2000" @if($filter['cost'] == '1001,2000') checked @endif>
                  <label for="shop-filter-price_2">₦1000 to ₦2000</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" id="shop-filter-price_3" value="2001,3000" @if($filter['cost'] == '2001,3000') checked @endif>
                  <label for="shop-filter-price_3">₦2000 to ₦3000</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" id="shop-filter-price_4" value="3001,4000" @if($filter['cost'] == '3001,4000') checked @endif>
                  <label for="shop-filter-price_4">₦3000 to 4000</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" id="shop-filter-price_5" value="4001,5000" @if($filter['cost'] == '4001,5000') checked @endif>
                  <label for="shop-filter-price_5">₦4000 to ₦5000</label>
                </div></br>
                <div class="radio">
                  <input type="radio" class="cost" name="cost" id="shop-filter-price_6" value="5001,20000" @if($filter['cost'] == '5001,20000') checked @endif>
                  <label for="shop-filter-price_6">Above 5000</label>
                </div></br>
                 --}}
      
                
                
                  <br>
                <button type="submit" class="btn btn-default btn-block">Filter</button>
      
              </form>
            </div>
            <div id="menu_result">
              @include('frontend.meal.list')
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
  </div>
  
@endsection
@push('scripts')
    <script>
      $('.period').click(function(){
          if($('.period:checked').length < 1)
        $(this).prop('checked', true);
        filtermeals();
      });
      $('.itemtype').click(function(){
          if($('.itemtype:checked').length < 1)
          $(this).prop('checked', true);
        filtermeals();
      });
      $('.origin').click(function(){
          if($('.origin:checked').length < 1)
        $(this).prop('checked', true);
        filtermeals();
      });
      $('.diet').click(function(){
          if($('.diet:checked').length < 1)
        $(this).prop('checked', true);
        filtermeals();
      });
      $('.cost').click(function(){
          if($('.cost:checked').length < 1)
        $(this).prop('checked', true);
        filtermeals();
      });
      $('.shop_menu').submit(function(e){
          e.preventDefault();
          var search = '';
          if($(this).attr('id') =="shop_search")
              search = $('input[name="search"]').val();
          else $('input[name="search"]').val('');
          filtermeals(search);
      });
    </script>
    <script>
        function filtermeals(search = ''){
            var itemtype = [];
            $('.itemtype:checked').each(function(index){ itemtype.push($(this).val()); });
            var period = [];
            $('.period:checked').each(function(index){ period.push($(this).val()); });
            var origin = [];
            $('.origin:checked').each(function(index){ origin.push($(this).val()); });
            var diet = [];
            $('.diet:checked').each(function(index){ diet.push($(this).val()); });
            var cost = $('input[name="cost"]:checked').val();
            $.ajax({
                type:'POST',
                dataType: 'html',
                url: "{{route('meals')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'search' : search,
                    'itemtype' : itemtype,
                    'period' : period,
                    'origin' : origin,
                    'diet' : diet,
                    'cost' : cost
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
        }
    </script>
    <script>
        $(document).on('click','.add-to-cart',function(){
            var item_id = parseInt($(this).attr('data-item_id'));
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('cart.add')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id
                },
                success:function(data) {
                    $('.cart-count').html(data.cart_count);
                    $('.cart-count,.pulse').show();
                    console.log(data.cart);
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });   
        $(document).on('click','.add-to-wish',function(){
          var item_id = parseInt($(this).attr('data-item_id'));
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('user.bookmark.add')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id
                },
                success:function(data) {
                  alert('Item Saved');
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });
    </script>
@endpush