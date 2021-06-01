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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.meal.save')}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Meal Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                                <small class="form-text text-muted">The name of the meal</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Description</label>
                                                <textarea name="description" class="form-control" rows="4" style="height: unset" required></textarea>
                                            </div>
                                            <div class="form-group d-flex">
                                                <span class="text-muted">Type</span>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="food-type" id="food" value="food">
                                                        <span class="form-check-sign"></span>
                                                        Food
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="food-type" id="drink" value="drink" checked="">
                                                        <span class="form-check-sign"></span>
                                                        Drink
                                                    </label>
                                                </div>    
                                            </div>
                                            <label class="">Size</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="size" placeholder="Enter Size" class="form-control">
                                                <select class="input-group-append border rounded">
                                                    <option>ml</option>
                                                    <option>liters</option>
                                                    <option>small</option>
                                                    <option>medium</option>
                                                    <option>large</option>
                                                </select>    
                                            </div>
                                            <div class="form-group">
                                                <label class="">Price</label>
                                                <input name="price" type="number" class="form-control" placeholder="Amount in naira">
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Meal Photo</label>
                                                <input type="file" name="file" id="cover" required>
                                                <label class="mt-3"> Image </label>
                                                <img src="{{asset('img/no-image.jpg')}}" alt="" style="height:250px;" class="w-100" data-format="image" id="featured">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block " type="submit" style="cursor:pointer">
                                                    Save Meal
                                                </button>
                                            </div>
                                              
                                        </div>
                                        
                                    </div>
                                    
                                </fieldset> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card data-tables strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Meal</h4>
                            <p class="card-category">Here is a subtitle for this table</p>
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
                                    <th>Thumbnail</th>
                                    <th style="width:300px;">Name</th> 
                                    <th>Price</th>
                                    <th >Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($meals as $meal)
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
                                                @if(!$meal->media)
                                                    <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded">
                                                @else
                                                    <img src="{{asset('storage/images/'.$menu->media->name)}}" class="avatar rounded">
                                                @endif
                                            </td>
                                            <td>
                                                <h4 class="mt-0">
                                                    <a href="#">{{$meal->name}}</a>
                                                    @switch($meal->type)
                                                    @case('food')
                                                        <i class="fa fa-cutlery"></i>
                                                        @break
                                                    @case('drink')
                                                        <i class="fa fa-beer"></i>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                                    <small class="card-category text-muted"> 1000ml</small>
                                                </h4>
                                                <h5>{{$meal->description}}</h5>    
                                            </td>
                                            
                                            <td>
                                                <h5>₦{{$meal->price}}</h5>
                                                
                                            </td>
                                            <td class="d-block">
                                                <div class="">
                                                    <a href="{{route('admin.meal.edit',$meal)}}" rel="tooltip" title="edit meal" data-placement="left" class="btn btn-info btn-outline btn-sm mb-2 rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>  
                                                    </a>
                                                    <br>
                                                    <a href="#" type="button" data-toggle="modal" data-target="#delete-meal{{$meal->id}}" class="btn btn-danger btn-outline btn-sm rounded" rel="tooltip" title="delete meal" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-meal{{$meal->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-meal{{$meal->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Delete meal</p>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this meal</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.meal.delete',$meal)}}" method="POST">@csrf
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
<script>
        
    $("#cover").change(function() {
        readURL(this,'featured');
        // $('#remove_image').show();
    });
    function readURL(input,output) {
        console.log(input.id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#'+output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.food-type').click(function(){
        if($('#food').is(':checked'))
            $('.venue').hide();
        else $('.venue').show();
    })
</script>
@endpush

          