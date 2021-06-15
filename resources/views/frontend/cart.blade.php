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
                            <tr>
                                <td>
                                    <a href="#">
                                        <div class="meal d-flex flex-column">
                                            <img src="{{asset('storage/meals/'.$item['product']->media->name)}}" class="avatar rounded m-0" alt="">     
                                            <a href="#" class="text-danger visible-xs" href="#"><u>Remove</u></a>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex justify-content-between">
                                            <span>{{$item['product']->name}}</span>
                                            <span class="visible-xs">₦{{$item['product']->price}}</span>
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
                                                        <input type="number" name="quantity" class="form-control" style="width:50px;"
                                                            value="{{$item['quantity']}}">
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
                                            <input type="number" name="quantity" class="form-control" style="width:70px;"
                                                value="{{$item['quantity']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden-xs"><a href="#" class="icon text-danger"><i class="fa fa-times"></i></a></td>
                                <td class="hidden-xs">
                                    ₦{{$item['product']->price * $item['quantity']}}
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                        {{-- <tr>
                            <td>
                                <a href="#">
                                    <div class="meal d-flex flex-column">
                                        <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded m-0" alt="">     
                                        <a href="#" class="text-danger visible-xs" href="#"><u>Remove</u></a>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="d-flex justify-content-between">
                                        <span>This Product</span>
                                        <span class="visible-xs">₦2,363.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 mt-sm-0">
                                        <span>This Product Description is good for eating</span>
                                        <span class="visible-xs">
                                            <div class="qty-box">
                                                <div class="form-group">
                                                    <input type="number" name="quantity" class="form-control" style="width:50px;"
                                                        value="1">
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    
                                </div>
                            </td>
                            <td class="hidden-xs">
                                ₦63.00
                            </td>
                            <td class="hidden-xs">
                                <div class="qty-box">
                                    <div class="">
                                        <input type="number" name="quantity" class="form-control" style="width:70px;"
                                            value="1">
                                    </div>
                                </div>
                            </td>
                            <td class="hidden-xs"><a href="#" class="icon"><i class="fa fa-times"></i></a></td>
                            <td class="hidden-xs">
                                ₦4539.00
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
                <table class="table">
                    <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td class="text-right">
                                @php $total = 0; @endphp
                                    @foreach($cart as $item)
                                        @php $total += $item['quantity'] * $item['product']->price  @endphp
                                    @endforeach
                                <h3>₦{{number_format($total)}}</h3>
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
					<span class="badge badge-secondary badge-pill">3</span>
				</h4>
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0 font-weight-bold">Items</h6>
						<small class="text-muted">You have 15 items in your cart</small>
					</div>
					<span class="text-muted">₦12</span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0 font-weight-bold">Delivery</h6>
						<small class="text-muted">25, Surulere Street, off Kokoro Abu, Ikorodu Lagos</small>
						<a class="small text-danger d-block" href="#">Set your delivery address</a>
					</div>
					<span class="text-muted">₦8</span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">VAT</h6>
						<small class="text-muted">7.5% of subtotal</small>
					</div>
					<span class="text-muted">₦5</span>
					</li>
					<li class="list-group-item d-flex justify-content-between bg-light">
					<div class="text-success">
						<h6 class="my-0">Promo code</h6>
						<small>EXAMPLECODE</small>
					</div>
					<span class="text-success">-₦5</span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
					<span>Total (USD)</span>
					<strong>₦20</strong>
					</li>
				</ul>
			
				<form class="card p-2">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Promo code">
						<div class="input-group-addon">
							<button type="submit" class="btn btn-secondary btn-xs py-0">Redeem</button>
						</div>
					</div>
				</form>
				<hr class="mb-4">
                @guest <small class="d-block text-danger text-center">-------Please login-----------</small> @endguest
                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <input type="hidden" name="email" value="{{Auth::user()->name ?? 'null'}}"> {{-- required --}}
                    
                    <input type="hidden" name="amount" value="80000"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    {{--<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">  required --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                
				<button class="btn btn-primary btn-lg btn-block @guest disabled @endguest" type="submit">Continue to checkout</button>
                </form>
			</div>
        </div>
        
		
	</div>
</div>
@endsection
@push('scripts')

{{-- 
//1.increase quantity and subtotal 
//2.calculate total
//3.remove item from cart
//4.process discount
//5.set address & delivery fee
//6.calculate grandtotal
//7.payment 
--}}

	<script>
		$(document).on('click','.remove-from-cart',function(){
            var item = $(this).attr('data-item');
            var item_id = parseInt($(this).attr('data-item_id'));
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
                  alert('success');
                    // ₦('#cart-notification').html(data.cart_count);
                    // ₦('#cart-notification,.shopping-cart').show();
                    // var cart_total = 0;
                    // var listing;
                    // ₦('#shopping_list').html('');
                    // ₦.each( data.cart, function( key, value ) {
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
                    //     ₦('#shopping_list').prepend(listing);
                    // });
                    // ₦('#cart_total').html(cart_total);
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });
	</script>
@endpush