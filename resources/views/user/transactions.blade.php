@extends('frontend.layouts.app')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/user-dashboard.css')}}">
@endpush
@section('main')
<div id="features" class="text-centers">
	<div class="container">
	  	<div class="section-title">
			<h2>TRANSACTIONS</h2>
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
                                
                                <table class="table table-responsive-sm mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Order</th>
                                            <th scope="col">payment method</th>
                                            <th scope="col">status</th>
                                            <th scope="col">amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user->payments as $payment)
                                        <tr>
                                            <td>{{$payment->created_at->format('M-jS')}}</td>
                                            <td><a href="{{route('user.order.show',$payment->order)}}">View Order</a></td>
                                            <td>{{$payment->method}}</td>
                                            <td>{{$payment->status}}</td>
                                            <td>₦{{$payment->amount}}</td> 
                                        </tr>
                                        @empty
                                            <tr><td colspan="7">No Transaction</td></tr>
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
