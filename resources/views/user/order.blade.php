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
							<img src="{{asset('img/avatar.jpg')}}" alt="" class="img-fluid">
						</div>
						<div class="profile-detail">
							<h5>Fashion Store</h5>
							<h6>750 followers | 10 review</h6>
							<h6>mark.enderess@mail.com</h6>
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
                            {{-- <img src="{{asset('img/success.png')}}" alt=""> --}}
                            <p class="mb-1">Payment Is Successfully Processsed And Your Order Is On The Way</p>
                            <p class="">Transaction ID:267676GHERT105467</p>
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
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                    {{-- details = title, required at, delivery address --}}
                                </thead>
                                <tbody>
                                    @foreach ($order->details as $item)
                                        <tr> 
                                            <td>
                                                @if(!$item->itemable->media)
                                                <a href="{{route('meal.view',$item->itemable)}}">
                                                <div class="meal">
                                                    <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded m-0">
                                                </div>
                                                </a>
                                                @else
                                                <a href="{{route('meal.view',$item->itemable)}}">
                                                <div class="meal">
                                                    <img src="{{asset('storage/meals/'.$item->itemable->media->name)}}" class="avatar rounded m-0">
                                                </div>
                                                </a>
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                <h5 class="my-0">
                                                    {{$item->itemable->name.' '.$item->itemable->subname}}
                                                    {{-- <small>size: {{$item->meal->size}}</small>  --}}
                                                </h5>
                                                <small class="d-none d-md-block">
                                                    @if($item->itemable_type == 'App\Meal') 
                                                        
                                                        <br>
                                                        @foreach($item->itemable->items as $food)
                                                            {{$food->name.'('.$food->size.')'}}
                                                            @if(!$loop->last)+ @endif
                                                        @endforeach
                                                    @else
                                                    {{$item->itemable->description}}<br>
                                                    Size:{{ucwords($item->itemable->size)}}
                                                    
                                                    @endif
                                                </small>    
                                            </td>
                                            <td class="text-center"> {{$item->quantity}} </td>
                                            <td class="text-center">
                                                <h5>₦{{$item->amount}}</h5>
                                            </td>
                                            <td>
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
                                            <td colspan="4">
                                                <div class="d-flex justify-content-between">
                                                    <span class="">SubTotal</span>
                                                    <span>₦50,000</span>
                                                </div>     
                                            </td>   
                                        </tr> 
                                        <tr>
                                            <td colspan="4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Discount</span>
                                                    <span>₦50,000</span>
                                                </div>     
                                            </td>   
                                        </tr>      
                                        <tr>
                                            <td colspan="4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Delivery</span>
                                                    <span>₦50,000</span>
                                                </div>     
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <div class="d-flex justify-content-between">
                                                    <span class="h4 font-weight-bold">TOTAL</span>
                                                    <span class="h4 font-weight-bold">₦50,000</span>
                                                </div>     
                                            </td>   
                                        </tr>                                          
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
