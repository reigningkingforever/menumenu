@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-centers">
	<div class="container">
	  	<div class="section-title">
			<h2>ORDER</h2>
	  	</div>
		  <div class="row">
			<div class="col-lg-3 text-center">
				@include('user.menu')
			</div>
			<div class="col-lg-9">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card dashboard-table mt-0">
                            <div class="card-body">
                                
                                <table class="table-responsive-md table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Items </th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Deliveries</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">edit/delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user->orders as $order)
                                        <tr>
                                            <td>{{$order->created_at->format('M-jS')}}</td>
                                            <td>{{$order->items->count()}} items</td>
                                            <td>₦{{$order->amount}}</td>
                                            <td>@if($order->deliveries->isEmpty()) 0 deliveries @else {{$order->deliveries->where('status',true)->count().' out of '.$order->deliveries->count()}} deliveries completed @endif</td>
                                            <td>{{$order->status}}</td>
                                            <td>
                                                <a href="{{route('user.order.show',$order)}}" class="text-primary">
                                                    <i class="fa fa-eye mr-1" aria-hidden="true"></i>View
                                                </a>|
                                                <a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#delete-order{{$order->id}}">
                                                    <i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete
                                                </a>
                                                <div class="modal fade modal-primary" id="delete-order{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-order{{$order->id}}" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content ">
                                                            <div class="modal-header justify-content-center">
                                                                    <p>Delete Order</p>																		
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <p>Are you sure you want to delete this order</p>
                                                                <form class="d-inline" action="{{route('user.order.delete',$order)}}" method="POST">@csrf
                                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                                </form>
                                                                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr><td colspan="7">No Order</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		
	</div>
</div>
@endsection
@push('scripts')
	
@endpush
