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
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.tag.save')}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Tag Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                                <small class="form-text text-muted">Name of Tag</small>
                                            </div>
                                            
                                            
                                            <div class="form-group">                                               
                                                <label class="">Tag Type</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option>Category</option>
                                                    <option>Size</option>
                                                    <option>Day</option>
                                                    <option>Origin</option>
                                                    <option>Diet</option>  
                                                    <option>Other</option>  
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-3">Purpose</label>
                                                <div class="row">
                                                    {{-- <label class="col-sm-2 control-label">Checkboxes and radios</label> --}}
                                                    <div class="col-sm-10">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" name="is_meal" type="checkbox" value="1">
                                                                <span class="form-check-sign"></span>
                                                                Use For Meals
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" name="is_post" type="checkbox" value="1">
                                                                <span class="form-check-sign"></span>
                                                                Use For Post
                                                            </label>
                                                        </div>
                                                        <label class="mb-3">Status</label>
                                                        <div class="form-check form-check-radio">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                                                                <span class="form-check-sign"></span>
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-radio">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked="">
                                                                <span class="form-check-sign"></span>
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block " type="submit" style="cursor:pointer">
                                                    Save Tag
                                                </button>
                                            </div>
                                              
                                        </div>
                                        
                                    </div>
                                    
                                </fieldset> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card data-tables strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Tags</h4>
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
                                    <th>Name</th> 
                                    <th>Type</th>
                                    <th>For</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>
                                                <div class="form-check checkbox-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                        <span class="form-check-sign"></span> 
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{$tag->name}}   
                                            </td>
                                            <td>
                                                {{$tag->type}}  
                                            </td>
                                            <td>
                                                @if($tag->is_meal) <span class="badge badge-primary">Meal</span>@endif
                                                @if($tag->is_post) <span class="badge badge-info">Post</span> @endif
                                            </td>
                                            <td>
                                                @if($tag->status) <span class="badge badge-success">Active</span>
                                                @else <span class="badge badge-danger">Inactive</span> @endif
                                            </td>
                                            <td class="d-block">
                                                <div class="">
                                                    <a href="{{route('admin.tag.edit',$tag)}}" rel="tooltip" title="edit item" data-placement="left" class="btn btn-info btn-outline btn-sm rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>  
                                                    </a>
                                                    {{-- <br> --}}
                                                    <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#delete-item{{$tag->id}}" class="btn btn-danger btn-outline btn-sm rounded" rel="tooltip" title="delete item" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-item{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-item{{$tag->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Delete item</p>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this item</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.tag.delete',$tag)}}" method="POST">@csrf
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
        "lengthtag": [
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

          