@extends('backend.layouts.app')
@push('styles')
    <style>
        table td{
            text-overflow: ellipsis;
            overflow: hidden;
            /* white-space: nowrap; */
        }
        .form-check{
            margin-bottom:0px;
        }
        .form-check .form-check-label{
            bottom:15px;
            
        }
        form button{
            cursor: pointer;
        }
        .odds{
            background:#0000000d
        }
    </style>
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Purchase</h4>
                            <p class="card-category">Here is a sub name for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive dataTable dtr-inline">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                
                            </div>
                            <table id="datatables" class="table table-hover " cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>
                                        <a href="#" class="btn btn-danger btn-outline btn-sm" rel="tooltip" title="Delete all selected" data-placement="bottom" >
                                        <span class="btn-label">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                        
                                        </a>
                                    </th>
                                    <th>Date</th>
                                    
                                    <th style="width:300px;">Details</th> 
                                    <th>Required at</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                    {{-- details = title, required at, delivery address --}}
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            
                                            <td>
                                                <div class="form-check checkbox-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                        <span class="form-check-sign"></span> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td><span class="text-muted">{{$purchase->created_at->format('M d')}}</span></td>
                                            
                                            <td>
                                                <h5 class="my-0">
                                                    <a href="#">{{$purchase->details->first()->meal->name}} </a>
                                                    <small class="card-category text-muted"> @if($purchase->details->count() > 1) + {{$purchase->details->count() - 1}} more @endif</small>
                                                </h5>
                                                <small class="d-block"><i class="fa fa-user"></i>{{$purchase->user->name}}</small>    
                                                <small><i class="fa fa-map-marker"></i>{{$purchase->delivery_address}}</small>    
                                            </td>
                                            
                                            <td><h5 class="mb-0">{{$purchase->required_at->format('M d')}}</h5>
                                                <small>{{$purchase->required_at->format('h:i A')}}</small>
                                            </td>
                                            <td><h5>???{{$purchase->amount}}</h5></td>
                                            <td>
                                                <h5>{{$purchase->status}}</h5>
                                            </td>
                                            <td class="d-block">
                                                <div class="">
                                                    <a href="#" type="button" data-toggle="modal" data-target="#change-status{{$purchase->id}}" rel="tooltip" title="change status" data-placement="left" class="btn btn-warning btn-outline btn-sm mb-2 rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-bars"></i>
                                                        </span>  
                                                    </a>
                                                    <br>
                                                    <a href="#" type="button" data-toggle="modal" data-target="#delete-purchase{{$purchase->id}}" rel="tooltip" title="delete purchase" data-placement="left" class="btn btn-danger btn-outline btn-sm rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-mini modal-primary" id="change-status{{$purchase->id}}" tabindex="-1" role="dialog" aria-labelledby="change-status{{$purchase->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                
                                                                <div class="modal-body text-center">
                                                                    <p>Change Purchase Status to</p>
                                                                    <form action="{{route('admin.purchase.status',$purchase)}}" method="POST">@csrf
                                                                        <div class="d-flex">
                                                                            <select name="" id="" class="form-control mb-2">
                                                                                <option>Pending</option>
                                                                                <option>Paid</option>
                                                                                <option>Delivered</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                        <button type="button" class="btn btn-danger btn-simple" style="cursor:pointer" data-dismiss="modal">Close</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="modal fade modal-mini modal-primary" id="delete-purchase{{$purchase->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-purchase{{$purchase->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Delete purchase</p>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this purchase</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.purchase.delete',$purchase)}}" method="POST">@csrf
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
@endsection
@push('scripts')
<script src="{{asset('backend/js/plugins/bootstrap-table.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script>
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        // sortable: true,
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

</script>


@endpush

          