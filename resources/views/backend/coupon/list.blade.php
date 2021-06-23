@extends('backend.layouts.app')
@push('styles')
    
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">All Coupon</h4>
                        </div>
                        <div class="card-body ">
                            <div class="top-sec">
                                
                            <a href="{{route('admin.coupon.create')}}" class="btn btn-sm btn-primary">Add Coupon</a>
                            </div>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Period</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($coupons as $coupon)
                                            <tr class="jsgrid-row">
                                                <td scope="row"> {{$coupon->name}}</td>
                                                <td scope="row"> {{$coupon->code}}</td>
                                                <td scope="row"> @if($coupon->type=="percent") {{$coupon->value}}% Off @else -{{$coupon->value}}Off @endif</td>
                                                <td scope="row"> @if($coupon->start_at && $coupon->end_at){{ $coupon->start_at->format('M-d')}} to {{$coupon->end_at->format('M-d')}} @else - @endif</td>
                                                <td scope="row"><i class="fa fa-circle @if($coupon->status) text-success @else text-danger @endif f-12"></i></td>
                                                <td scope="row">
                                                    
                                                    <a href="{{route('admin.coupon.edit',$coupon)}}" class="btn btn-sm btn-primary rounded" title="pen"><i class="fa fa-pencil"></i></a>
                                                    <button class="btn btn-sm btn-danger rounded" title="Delete" data-toggle="modal" data-target="#coupon{{$coupon->id}}"><i class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="coupon{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="coupon{{$coupon->id}}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Delete Coupon</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form class="needs-validation" action="{{route('admin.coupon.delete')}}" method="POST" enctype="multipart/form-data">@csrf
                                                                    <div class="modal-body">
                                                                        <h5>Are you sure you want to delete coupon: {{$coupon->name}} </h5>
                                                                        <input type="hidden" name="coupon_id" value="{{$coupon->id}}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-danger" type="submit">Yes, Delete</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> 
                                        @empty
                                            <td scope="row">No Coupon</td>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
 
@endpush
          