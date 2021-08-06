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
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Mail</h4>
                                <a href="{{route('admin.messages.create')}}" class="btn btn-primary mr-5">New Mail</a>
                            </div>
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
                                    <th>date</th>
                                    <th>Sent by</th>
                                    <th>Subject</th>
                                    <th>Receivers</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>
                                                <div class="form-check checkbox-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                        <span class="form-check-sign"></span> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{$message->created_at->format('F d, Y')}}</td>
                                            <td>{{$message->user->name}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>All Subscribers</td>
                                            <td> @if($message->status) Success @else Failed @endif </td>
                                            
                                            
                                            <td>
                                                <div class="d-flex">
                                                    @if(!$message->status)
                                                    <form class="d-inline" action="#" method="POST">@csrf
                                                        <button type="submit" class="btn btn-info btn-outline btn-sm" rel="tooltip" title="mark as seen" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                        
                                                        </button>
                                                    </form>
                                                    @endif
                                                    <button type="button" data-toggle="modal" data-target="#delete-message{{$message->id}}" class="btn btn-danger btn-outline btn-sm rounded" rel="tooltip" title="delete message" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </button>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-message{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-message{{$message->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    
                                                                        <p>Delete message</p>
                                                                    
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this message</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="#" method="POST">@csrf
                                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
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

          