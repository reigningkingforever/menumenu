@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>ORDER</h2>
	  	</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="dashboard-sidebar">
					<div class="profile-top">
                        <div class="profile-image">
                            @if($order->user->media)
                            <img src="{{asset('storage/users/'.$order->user->media->name)}}" alt="" class="img-fluid">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{$order->user->name}}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="profile-detail">
                            <h5>{{$order->user->name}}</h5>
                            
                            <h6>{{$order->user->email}}</h6>
                        </div>
                    </div>
					<div class="faq-tab">
						<ul class="nav nav-tabs" id="top-tab" role="tablist">
							<li class="nav-item">
                                <a class="nav-link active" href="{{route('user.home')}}">dashboard</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="faq-content tab-content" id="top-tabContent">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            @switch($order->status)
                                @case('pending')
                                <p class="font-weight-bold mb-3">Payment is pending and your order will be processsed once your payment is received</p>
                                @break
                                @case('paid')
                                <p class="font-weight-bold mb-2">Payment was successful and your order is currently being processed</p>
                                @break
                                @case('processing')
                                <p class="font-weight-bold mb-2">Your order is almost ready and will be delivered on {{$order->required_at->format('l d M at h:i A')}}</p>
                                @break
                                @case('completed')
                                <p class="font-weight-bold mb-1">Your Order has been delivered on {{$order->delivered_at->format('l d M at h:i A')}}</p>
                                <p class="">Thank you for patronizing us</p>
                                @break
                                @default
                                <p class="font-weight-bold mb-1">Your Order was cancelled</p>
                                @break
                            @endswitch
                            
                            @if($order->payment)
                                <p class="font-weight-bold mb-1">Transaction ID:{{$order->payment->reference}}</p>
                            @endif
                            <div style="border-top:1px solid #777;height:1px;margin: 0px 30px 30px;"></div>
                            {{-- <img src="{{asset('img/order-success.png')}}" alt="" style="margin-top: 30px;"> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="" class="table table-hover table-bordered">
                                <thead>
                                    <th style="width:70px;">Thumbnail</th>
                                    <th style="width:300px;">Details</th>
                                    <th class="hidden-xs">Price</th>
                                    <th class="hidden-xs">Quantity</th>
                                    <th class="hidden-xs">Amount</th>
                                    <th class="hidden-xs">Action</th>
                                    {{-- details = title, required at, delivery address --}}
                                </thead>
                                <tbody>
                                    @foreach ($order->details as $item)
                                    <tr>
                                        <td>
                                            <a href="{{route('meal.view',$item->meal)}}">
                                                <div class="meal d-flex flex-column">
                                                    @if(!$item->meal->media)
                                                        <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded m-0">
                                                    @else
                                                        <img src="{{asset('storage/meals/'.$item->meal->media->name)}}" class="avatar rounded m-0">
                                                    @endif
                                                    <a href="#" class="text-danger visible-xs" href="#"><u>Review</u></a>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex flex-column">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{$item->meal->name.' '.$item->meal->subname}} <span class="visible-xs"> x {{$item->quantity}}</span></span>
                                                    <span class="visible-xs">₦{{$item->amount}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mt-2 mt-sm-0">
                                                    <span>    
                                                        @foreach($item->meal->items as $food)
                                                            {{$food->name.' ('.$food->size.')'}}
                                                            @if(!$loop->last)+ @endif
                                                        @endforeach 
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden-xs">
                                            ₦{{$item->price}}
                                        </td>
                                        <td class="hidden-xs">
                                            <div class="qty-box">
                                                <div class="">
                                                    {{$item->quantity}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden-xs">
                                            ₦{{$item->amount}}
                                        </td>
                                        <td class="hidden-xs">
                                            <div class="">
                                                <a href="#" type="button" data-toggle="modal" data-target="#assign-vendor{{$item->id}}" rel="tooltip" title="assign vendor" data-placement="left" class="btn btn-primary btn-outline btn-sm mb-2 rounded">
                                                    <span class="btn-label">
                                                        <i class="fa fa-pencil"></i>
                                                    </span>  Review
                                                </a>  
                                            </div> 
                                        </td>
                                    </tr>                                
                                    @endforeach 
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-between">
                                                    <span class="">SubTotal</span>
                                                    <span>₦{{$order->details->sum('amount')}}</span>
                                                </div>     
                                            </td>
                                            
                                        </tr> 
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-between">
                                                    <span>VAT</span>
                                                    <span>₦{{$order->vat}}</span>
                                                </div>     
                                            </td>   
                                        </tr>    
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-between">
                                                    <span>Delivery</span>
                                                    <span>₦{{$order->delivery_fee}}</span>
                                                </div>     
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-between">
                                                    <span>Discount</span>
                                                    <span>₦{{$order->discount}}</span>
                                                </div>     
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-between">
                                                    <span class="h4 font-weight-bold">TOTAL</span>
                                                    <span class="h4 font-weight-bold">₦{{$order->amount}}</span>
                                                </div>     
                                            </td> 
                                            @if($order->status =="pending")
                                            <td class="hidden-xs" colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-primary">Pay Now</button>
                                                </div>  
                                            </td>
                                            @endif 
                                        </tr> 
                                        @if($order->status =="pending")
                                        <tr class="visible-xs">
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-primary">Pay Now</button>
                                                </div>  
                                            </td>  
                                        </tr> 
                                        @endif                                         
                                </tbody>
                            </table>
                        </div>
                    </div>
					
					
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection
