@if(url()->current() == url('/') || url()->current() == url('/meals'))
<nav class="navbar navbar-inverse navbar-fixed-bottom visible-xs">
    <div class="p-3 text-center">
      <ul class="list-inline">
        <li><a href="javascript:void(0)" class="btn btn-default btn-block" id="openfilter">FILTER<span class="mx-2"><i class="fa fa-filter"></i></span></a></li>
        {{-- <li><button class="btn btn-block btn-warning">SEARCH</button></li> --}}
        <li>
          <a href="{{route('cart')}}" class="btn btn-default btn-block">CART
            <span class="mx-2"><i class="fa fa-shopping-cart"></i></span>
            <span class="cart-count" @if(!Session('cart')) style="display:none;" @endif>{{collect((array) session('cart'))->sum('quantity')}}</span>
          </a>
        </li> 
        <li><a href="javascript:void(0)" class="btn btn-default btn-block" id="to-top">TOP<span class="mx-2"><i class="fa fa-arrow-up"></i></span></a></li> 
      </ul>
    </div>
</nav>
@endif
@if(url()->current() != url('/cart'))
<div class="float-button-wrapper rounded-circle pulse @if(Session('cart') || collect((array) session('cart'))->sum('quantity') > 1) visible-lg @endif" style="display:none;">
	<div class="box-shadow rounded-circle" style="position:relative;">
    <span class="cart-count" style="position:absolute;right:0px;background-color:#464545;color:white;padding:5px 12px 5px;border-radius:50px;">{{collect((array) session('cart'))->sum('quantity')}}</span>
		<a href="{{route('cart')}}" rel="noreferrer noopener">
			<img class="float-button" src="{{asset('img/cart.png')}}" alt="cart">
		</a>
	</div>
</div>
@endif

<div id="footer">
    <div class="container text-center">
      <div class="col-md-6">
        <p>&copy; 2021 MenuMenu. All rights reserved. Design by <a href="#" rel="nofollow">ReignTech</a></p>
      </div>
      <div class="col-md-6">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
</div>