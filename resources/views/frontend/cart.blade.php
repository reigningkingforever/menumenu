@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<!-- Features Section -->
<div id="features">
	<div class="container">
	  	<div class="section-title text-center">
			<h2>CART</h2>
	  	</div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <table class="table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col" style="width:70px;">Item</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="hidden-xs">price</th>
                            <th scope="col" class="hidden-xs">quantity</th>
                            <th scope="col" class="hidden-xs">action</th>
                            <th scope="col" class="hidden-xs">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $item)
                            <tr class="item" data-price="{{$item['product']->price}}" data-amount="{{$item['product']->price * $item['quantity']}}" data-qty="{{$item['quantity']}}">
                                <td>
                                    <a href="#">
                                        <div class="meal d-flex flex-column">
                                            <img src="{{asset('storage/meals/'.$item['product']->media->name)}}" class="avatar rounded m-0" alt="">     
                                            <a href="javascript:void(0)" data-item="{{$item['type']}}" data-item_id="{{$item['product']->id}}" data-slug="{{$item['product']->slug}}" class="text-danger visible-xs remove-from-cart" href="#"><u>Remove</u></a>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex justify-content-between">
                                            <span>{{$item['product']->name}}</span>
                                            <span class="visible-xs">₦<span class="total" data-slug="{{$item['product']->slug}}">{{$item['product']->price * $item['quantity']}}</span></span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 mt-sm-0">
                                            <span class="small">
                                                @if($item['type'] == 'App\Meal')        
                                                    @foreach($item['product']->items as $food)
                                                        {{$food->name.' ('.$food->size.')'}}
                                                        @if(!$loop->last)+ @endif
                                                    @endforeach
                                                @else
                                                    {{$item['product']->description}}<br>
                                                    <small>Size:{{ucwords($item['product']->size)}}</small>
                                                @endif
                                            </span>
                                            <span class="visible-xs">
                                                <div class="qty-box">
                                                    <div class="form-group">
                                                        <input type="number" name="quantity" class="form-control quantity" style="width:50px;"
                                                            value="{{$item['quantity']}}" slug="{{$item['product']->slug}}">
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    ₦{{$item['product']->price}}
                                </td>
                                <td class="hidden-xs">
                                    <div class="qty-box">
                                        <div class="">
                                            <input type="number" name="quantity" class="form-control quantity" style="width:70px;"
                                                value="{{$item['quantity']}}" slug="{{$item['product']->slug}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden-xs"><a href="javascript:void(0)" data-item="{{$item['type']}}" data-item_id="{{$item['product']->id}}" data-slug="{{$item['product']->slug}}" class="icon text-danger remove-from-cart"><i class="fa fa-times"></i></a></td>
                                <td class="hidden-xs">
                                    ₦<span class="total" data-slug="{{$item['product']->slug}}">{{$item['product']->price * $item['quantity']}}</span>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
                <table class="table">
                    <tfoot>
                        <tr>
                            <td>Subtotal :</td>
                            <td class="text-right">
                                
                                <h3>₦<span class="subtotal">{{number_format($order['subtotal'])}}</span></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="">
                                <div class="d-flex justify-content-between">
                                    <a href="{{url('/')}}#restaurant-menu" class="btn btn-default">Add More Menu Items</a>
                                    <a href="{{route('meals')}}" class="btn btn-default">Add More Meals</a>
                                </div>
                                
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-xs-12 col-md-4 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
					<span class="badge badge-secondary badge-pill"><span class="cart_count">{{collect($cart)->sum('quantity')}}</span></span>
				</h4>
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0 font-weight-bold">Items</h6>
						<small class="text-muted">You have <span class="cart_count">{{collect($cart)->sum('quantity')}}</span> items in your cart</small>
					</div>
					<span class="text-muted">₦<span class="subtotal">{{number_format($order['subtotal'])}}</span></span>
					</li>
                    @auth
					<li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0 font-weight-bold">Delivery</h6>
                            @if(Auth::user()->addresses->isNotEmpty())
                            <small class="text-muted">
                                {{Auth::user()->addresses->where('status',true)->first()->address}} ,
                                {{Auth::user()->addresses->where('status',true)->first()->town->name}}
                                {{Auth::user()->addresses->where('status',true)->first()->city->name}} LGA,
                                {{Auth::user()->addresses->where('status',true)->first()->state->name}}
                            </small>
                            @else
                            
                            <a class="small text-danger d-block" href="#" data-toggle="modal" data-target="#set-address">Set your delivery address</a>
                            @endif
                        </div>
                        <span class="text-muted">₦<span class="delivery">{{$order['delivery']}}</span></span>
					</li>
                    @endauth()
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">VAT</h6>
						<small class="text-muted">{{$order['vat_percent']}}% of subtotal</small>
					</div>
					<span class="text-muted">₦<span class="vat">{{$order['vat']}}</span> </span>
					</li>
					<li class="list-group-item d-flex justify-content-between bg-light">
					<div class="text-success">
						<h6 class="my-0">Promo code</h6>
						<small id="coupon_code">EXAMPLECODE</small>
					</div>
					<span class="text-success">-₦<span class="discount">0</span></span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
					<span class="font-weight-bold">Total (NGN)</span>
					<strong>₦<span class="grandtotal">{{$order['grandtotal']}}</span></strong>
					</li>
				</ul>
			
				<form class="card p-2">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Promo code" name="coupon">
						<div class="input-group-addon">
							<button type="button" id="applycoupon" class="btn btn-secondary btn-xs py-0">Redeem</button>
						</div>
					</div>
				</form>
                <small id="coupon_description" class="d-block text-info text-center"></small>
				<hr class="mb-4">
                @guest <small class="d-block text-danger">-------Please login-----------</small> @endguest
                <form method="POST" action="{{ route('checkout') }}">
                    @csrf
                    <input type="hidden" name="grandtotal" id="grandtotal" value="{{$order['grandtotal']}}">
                    <input type="hidden" name="subtotal" id="subtotal" value="{{$order['subtotal']}}">
                    <input type="hidden" name="vat" id="vat" value="{{$order['vat']}}">
                    <input type="hidden" name="delivery" id="delivery" value="{{$order['delivery']}}">
                    <input type="hidden" name="discount" id="discount" value="0">
                    
                    @forelse($cart as $item)
                    <input type="hidden" name="item[]" id="{{$item['product']->slug}}" value="{{ json_encode( $array = ['id' => $item['product']->id,'type'=>$item['type'],'quantity'=> $item['quantity'] ]  ) }}" >
                    @empty
                    @endforelse
				    <button class="btn btn-primary btn-lg btn-block @guest disabled @endguest" type="submit">Continue to checkout</button>
                </form>
			</div>
        </div>
        
		
	</div>
</div>
<div class="modal fade modal-primary" id="set-address" tabindex="-1" role="dialog" aria-labelledby="set-addresss" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <p>Set Address</p>
            </div>
            <form action="{{route('user.address')}}" method="POST">@csrf
                <input type="hidden" name="status[]" value="1" required aria-label="...">
                <div class="modal-body text-center">
                    <div class="form-group">
                        <input name="address[]" value="" class="form-control" placeholder="Address">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="town_id[]" class="form-control">
                                    @foreach ($towns as $town)
                                        <option value="{{$town->id}}">{{$town->name.', '.$town->city->name.' LGA'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="state_id[]" class="form-control">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}" >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function grandtotal(){
            var subtotal = $('#subtotal').val();
            var delivery = $('#delivery').val();
            var vat = $('#vat').val();
            var discount = $('#discount').val();
            var grandtotal = 0;
            grandtotal = parseInt(subtotal) + parseInt(delivery) + parseInt(vat) + parseInt(discount);
            $('.grandtotal').html(grandtotal);
            $('#grandtotal').val(grandtotal);
        }
        function subtotal(){
            var subtotal = 0;
            var cart_count = 0
            $('.item').each(function(index){
                subtotal += parseInt($(this).attr('data-amount'));
                cart_count += parseInt($(this).attr('data-qty'));
            });
            $('.subtotal').html(subtotal);
            $('#subtotal').val(subtotal);
            $('.cart_count').html(cart_count);
        }
        
        $(document).on('input','.quantity',function(){
            var qty = $(this).val(); //get the quantity
            var slug = $(this).attr('slug'); //get slug of the quantities 
            $('input[slug="'+slug+'"]').val(qty); //give quantity to all quantity input box
            $(this).closest('tr').attr('data-qty',qty); //place the quantity on the item row attribute
            var input = $('input[id="'+slug+'"]').val(); //get input of item
            input = JSON.parse(input);
            input.quantity = qty; //replace quantity in the input
            $('input[id="'+slug+'"]').val(JSON.stringify(input)); // return the new input
            var amount = parseInt($(this).closest('tr').attr('data-price')) * parseInt(qty); //calculate new amount
            $(this).closest('tr').attr('data-amount',amount); //place the amount on the item row attribute
            $('.total[data-slug="'+slug+'"]').html(amount); //place the amount onthe item row
            subtotal();
            grandtotal();
        })
 
    </script>
{{-- 

//5.set address & delivery fee
//7.payment 
--}}

	<script>
		$(document).on('click','.remove-from-cart',function(){
            var item = $(this).attr('data-item');
            var item_id = parseInt($(this).attr('data-item_id'));
            var clicked = $(this).closest('tr');
            var slug = $(this).attr('data-slug');
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('cart.remove')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id,
                    'item': item
                },
                success:function(data) {
                $('.cart_count').val(data.cart_count);
                //remove product from html
                clicked.remove();
                //remove product from input
                $('input[id="'+slug+'"]').remove();
                subtotal();
                grandtotal();
                   
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });
	</script>

    <script>
        $('#applycoupon').click(function (){
            var coupon = $('input[name="coupon"]').val();
            if(coupon != ''){
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:"{{route('applycoupon')}}",
                    data:{
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        'coupon': coupon,
                    },
                    success:function(data) {
                        $('#discount').val(data.value);
                        $('.discount').html(data.value);
                        $('#coupon_description').html(data.description);
                        if(data.value != 0)
                        $('#coupon_code').html(coupon.toUpperCase());
                        grandtotal();
                    },
                    error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    },
                });
            }
        });
    </script>
@endpush