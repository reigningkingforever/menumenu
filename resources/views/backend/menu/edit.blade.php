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
                            <form method="post" action="{{route('admin.menu.update',$menu)}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="">Item Name</label>
                                                <input type="text" name="name" value="{{$menu->name}}" class="form-control" required>
                                                <small class="form-text text-muted">The name of the item</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Description</label>
                                                <textarea name="description" class="form-control" rows="2" style="height: unset" required>{{$menu->description}}</textarea>
                                            </div>
                                            <div class="form-group d-flex">
                                                <span class="text-muted">Type</span>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="food" value="food" @if($menu->type == 'food') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Food
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="drink" value="drink" @if($menu->type == 'drink') checked @endif >
                                                        <span class="form-check-sign"></span>
                                                        Drink
                                                    </label>
                                                </div> 
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="fruit" value="fruit" @if($menu->type == 'fruit') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Fruit
                                                    </label>
                                                </div>   
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="pastries" value="pastries" @if($menu->type == 'pastries') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Pastries
                                                    </label>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="">Item Origin</label>
                                                    <select name="origin" id="" class="form-control">
                                                        <option @if($menu->origin == 'intercontinental') selected @endif value="intercontinental">Intercontinental</option>
                                                        <option @if($menu->origin == 'local') selected @endif value="local">Local</option>
                                                        <option @if($menu->origin == 'chinese') selected @endif value="chinese">Chinese</option>
                                                        <option @if($menu->origin == 'italian') selected @endif value="italian">Italian</option>
                                                        <option @if($menu->origin == 'russian') selected @endif value="russian">Russian</option>                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="">Diet</label>
                                                    <select name="diet" id="" class="form-control">
                                                        <option @if($menu->diet == 'vegan') selected @endif value="vegan">Vegan</option>
                                                        <option @if($menu->diet == 'veg') selected @endif value="veg">Vegetarian</option>
                                                        <option @if($menu->diet == 'nonveg') selected @endif value="nonveg">Non-Vegetarian</option>
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="companydocument">
                                                <div class="form-group">
                                                    <input name="price" value="{{$menu->price}}" type="number" class="form-control" placeholder="Amount in naira" required>
                                                </div>
                                            </div>
                                            <h5>Featured Image</h5>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="file">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                            <h6>Existing Image</h6>
                                            <img src="{{$menu->image}}" style="height:400px;" class="w-100" data-format="image" id="featured">
                                            
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block " type="submit" style="cursor:pointer">
                                                    Save Item
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
                            <h4 class="card-title">Menu Item</h4>
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
                                    <th>Thumbnail</th>
                                    <th style="width:300px;">Name</th> 
                                    <th>Price</th>
                                    <th >Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
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
                                                <div class="meal">
                                                    <img src="{{$menu->image}}" class="avatar rounded">
                                                </div>
                                            </td>
                                            <td>
                                                <h4 class="mt-0">
                                                    <a href="#">{{$menu->name}}</a>
                                                    @switch($menu->type)
                                                    @case('food')
                                                        <i class="fa fa-cutlery"></i>
                                                        @break
                                                    @case('drink')
                                                        <i class="fa fa-beer"></i>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                                    <small class="card-category text-muted"> {{$menu->size}}</small>
                                                </h4>
                                                <h5>{{$menu->description}}</h5>    
                                            </td>
                                            
                                            <td>
                                                <h5>₦{{$menu->price}}</h5>
                                                
                                            </td>
                                            <td class="d-block">
                                                <div class="">
                                                    <a href="{{route('admin.menu.edit',$menu)}}" rel="tooltip" title="edit item" data-placement="left" class="btn btn-info btn-outline btn-sm mb-2 rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>  
                                                    </a>
                                                    <br>
                                                    <a href="#" type="button" data-toggle="modal" data-target="#delete-item{{$menu->id}}" class="btn btn-danger btn-outline btn-sm rounded" rel="tooltip" title="delete item" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-item{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-item{{$menu->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Delete item</p>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this item</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.menu.delete',$menu)}}" method="POST">@csrf
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
    $('.food-type').click(function(){
        if($('#food').is(':checked'))
            $('.venue').hide();
        else $('.venue').show();
    })
</script>

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endpush

          