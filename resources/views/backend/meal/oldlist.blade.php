@extends('backend.layouts.app')
@push('styles')
    <style>
        table td{
            text-overflow: ellipsis;
            overflow: hidden;
            /* white-space: nowrap; */
        }
        form button{
            cursor: pointer;
        }
    </style>
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Menus</h4>
                                <a href="{{route('admin.menu.create')}}" class="btn btn-primary mr-5">Add New</a>
                            </div>
                            
                            <p class="card-category">Here is a subname for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <th>Image</th>
                                    <th>Menu</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($menus as $menu)
                                    <tr>
                                        <td class="card-user w-10">
                                            @if(!$menu->media->first())
                                            <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded">
                                            @elseif($menu->media->first()->format == "image")
                                            <img @if($menu->media->first()->external) src="{{$menu->media->first()->name}}" @else src="{{asset('storage/images/'.$menu->media->first()->name)}}" @endif class="avatar rounded">
                                            @else
                                            <img src="{{asset('storage/videos/menus-1.jpg')}}" class="avatar rounded">
                                            @endif
                                        </td>
                                            
                                        <td class="w-50">
                                            <h4 class="mt-0"><a href="#">{{$menu->name}}</a></h4>
                                            <h5>{{$menu->description}}</h5>
                                        </td>
                                        <td class="w-30">
                                            <span class="d-block">{{$menu->created_at->format('l d F')}}</span>
                                            <span>{{$menu->created_at->format('h:i A')}}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical">
                                                <form class="d-inline" action="{{route('admin.menu.duplicate',$menu)}}" method="POST">@csrf
                                                    <button type="submit" class="btn btn-primary btn-outline mb-2 rounded" rel="tooltip" title="duplicate menu" data-placement="left">
                                                    <span class="btn-label">
                                                        <i class="fa fa-clone"></i>
                                                    </span>
                                                    
                                                    </button>
                                                </form>
                                                <a href="{{route('admin.menu.edit',$menu)}}" rel="tooltip" title="edit menu" data-placement="left" class="btn btn-info btn-outline mb-2 rounded">
                                                    <span class="btn-label">
                                                        <i class="fa fa-pencil"></i>
                                                    </span>
                                                    
                                                </a>
                                                
                                                <button type="button" data-toggle="modal" data-target="#delete-menu{{$menu->id}}" class="btn btn-danger btn-outline rounded" rel="tooltip" title="delete menu" data-placement="left">
                                                    <span class="btn-label">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                </button>
                                                <div class="modal fade modal-mini modal-primary" id="delete-menu{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-menu{{$menu->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <p>Delete Menu</p>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <p>Are you sure you want to delete this menu</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form class="d-inline" action="{{route('admin.menu.delete',$menu)}}" method="POST">@csrf
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
                                    @empty
                                        <tr>
                                            <td colspan="4">No Menus</td>
                                        </tr>
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
{{-- <script src="{{vendors/datatables.net/jquery.dataTables.js}}"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>    --}}
@endpush
          