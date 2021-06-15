@extends('backend.layouts.app')
@push('styles')
    
    
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-muted">
                                            <h4 class="card-title text-muted">Customer Info</h4>
                                            <span class="border  d-block mr-5 mb-3"></span>
                                            <span>Mrs Idera Margaret</span>
                                            <span class="d-block">reigningkingforever@gmail.com</h4>
                                            <span class="d-block">08053308425</span>
                                            <small class="d-block">51, Kano street, Ebute-meta east, Lagos</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-muted">
                                            <span class="d-flex justify-content-between card-title text-muted"><span class="h4 my-0">Order</span> <span>pending</span></span>
                                            <span class="border d-block mr-5 mb-3"></span>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">Order no:</span>
                                                <span class=" small">04332323</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">Order Date:</span>
                                                <span class="small">Friday 12.12.12</span>
                                                
                                            </div>
                                            <div class="d-flex justify-content-between">
                        
                                                <span class="text-muted">Required Date:</span>
                                                <div>
                                                    <small class="d-block">Saturday 12.12.12</small>
                                                    <small>2 hours from now</small>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            {{-- <small class="d-block">51, Kano street, Ebute-meta east, Lagos</small> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="data-tables strpied-tabled-with-hover">
                                        
                                        <div class=" table-full-width table-responsive dataTable dtr-inline">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                <div class="d-flex justify-content-between px-3">
                                                    
                                                    <button class="btn btn-success">Mark all ready</button>
                                                
                                                    <button class="btn btn-primary">Assign All to Vendor</button>
                                                    
                                                </div>
                                            </div>
                                            <table id="datatables" class="table table-hover " cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <th>Thumbnail</th>
                                                    <th style="width:300px;">Details</th>
                                                    <th>Quantity</th>
                                                    <th>Supplier</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    {{-- details = title, required at, delivery address --}}
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->details as $item)
                                                        <tr> 
                                                            <td>
                                                                @if(!$item->meal->media)
                                                                <div class="meal">
                                                                    <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded">
                                                                </div>
                                                                @else
                                                                <div class="meal">
                                                                    <img src="{{asset('storage/meals/'.$item->meal->media->name)}}" class="avatar rounded">
                                                                </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <h5 class="my-0">
                                                                    <a href="{{route('meal.view',$item->meal)}}">{{$item->meal->name}} </a>
                                                                    <small>size: {{$item->meal->size}}</small> 
                                                                </h5>
                                                                <small class="d-none d-md-block">{{$item->meal->description}}</small>    
                                                            </td>
                                                            <td> 12 </td>
                                                            <td>Armani Kitchen</td>
                                                            <td>
                                                                <h5>{{$item->status}}</h5>
                                                            </td>
                                                            <td class="d-block">
                                                                <div class="">
                                                                    <a href="#" type="button" data-toggle="modal" data-target="#assign-vendor{{$item->id}}" rel="tooltip" title="assign vendor" data-placement="left" class="btn btn-primary btn-outline btn-sm mb-2 rounded">
                                                                        <span class="btn-label">
                                                                            <i class="fa fa-bars"></i>
                                                                        </span>  
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" type="button" data-toggle="modal" data-target="#mark-ready{{$item->id}}" rel="tooltip" title="mark ready" data-placement="left" class="btn btn-success btn-outline btn-sm rounded">
                                                                        <span class="btn-label">
                                                                            <i class="fa fa-check"></i>
                                                                        </span>
                                                                    </a>
                                                                    <div class="modal fade modal-mini modal-primary" id="assign-vendor{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="assign-vendor{{$item->id}}" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                
                                                                                <div class="modal-body text-center">
                                                                                    <p>Assign Item to</p>
                                                                                    <form action="{{route('admin.order.purchase',$item)}}" method="POST">@csrf
                                                                                        <div class="d-flex">
                                                                                            <select name="" id="" class="form-control mb-2">
                                                                                                <option>Armani Kitchen</option>
                                                                                                <option>Exotic Foods</option>
                                                                                                <option>Ma'Great Taste</option>
                                                                                                <option>Mama Kas</option>
                                                                                            </select>
                                                                                            
                                                                                        </div>
                                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                                        <button type="button" class="btn btn-danger btn-simple" style="cursor:pointer" data-dismiss="modal">Close</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="modal fade modal-mini modal-primary" id="mark-ready{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mark-ready{{$item->id}}" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header justify-content-center">
                                                                                    <p>Mark ready</p>
                                                                                </div>
                                                                                <div class="modal-body text-center">
                                                                                    <p>Are you sure item is ready</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <form class="d-inline" action="{{route('admin.order.ready',$item)}}" method="POST">@csrf
                                                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                                                    </form>
                                                                                    <button type="button" class="btn btn-link btn-simple" style="cursor:pointer" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                    @endforeach                                               
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-image">
                            <img src="{{asset('img/gallery/01.jpg')}}" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="{{asset('img/gallery/02.jpg')}}" alt="...">
                                    <h5 class="title">Vendor</h5>
                                </a>
                                <p class="description">
                                    Ma'Great Taste
                                </p>
                            </div>
                            <p class="description text-center">
                                "Lamborghini Mercy
                                <br> Your chick she so thirsty
                                <br> I'm in that two seat Lambo"
                            </p>
                        </div>
                        <hr>
                        <div class="button-container mr-auto ml-auto">
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-facebook-square"></i>
                            </button>
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-twitter"></i>
                            </button>
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-google-plus-square"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')


@endpush

          