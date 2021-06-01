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
                                <h4 class="card-title">Testimonies</h4>
                                {{-- <a href="{{route('admin.testimony.create')}}" class="btn btn-primary mr-5">Add New</a> --}}
                            </div>
                            
                            <p class="card-category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <th class="w-10">Media</th>
                                    <th class="w-50">Testimony</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($testimonies as $testimony)
                                        <tr>
                                            <td class="card-user">
                                                @if(!$testimony->media->first())
                                                    <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded">
                                                @elseif($testimony->media->first()->format == "image")
                                                    <img @if($testimony->media->first()->external) src="{{$testimony->media->first()->name}}" @else src="{{asset('storage/images/'.$testimony->media->first()->name)}}" @endif class="avatar rounded">
                                                @else
                                                    <img src="{{asset('storage/videos/events-1.jpg')}}" class="avatar rounded">
                                                @endif
                                            </td>
                                            <td>
                                                <h4 class="mt-0"><a href="{{route('testimonies.show',$testimony)}}">{{$testimony->title}} </a>
                                                    <span class="small text-muted">
                                                        @if($testimony->status) <i class="fa fa-check"> @else <i class="fa fa-warning"> @endif </i></span>
                                                </h4>
                                                <h5>
                                                    <span class="font-weight-bold">{{$testimony->name}}: </span>
                                                    {{Illuminate\Support\Str::words($testimony->body,30, '...')}}
                                                </h5>
                                                
                                            </td>
                                            <td>
                                                <span class="d-block">{{$testimony->created_at->format('F d,Y')}}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <form class="d-inline" action="{{route('admin.testimony.status',$testimony)}}" method="POST">@csrf
                                                         
                                                        @if($testimony->status) 
                                                            <button type="submit" class="btn btn-warning btn-outline mb-2 rounded" rel="tooltip" title="Unapprove Testimony" data-placement="left">
                                                                <span class="btn-label">
                                                                    <i class="fa fa-warning"></i>
                                                                </span>
                                                        @else 
                                                            <button type="submit" class="btn btn-success btn-outline mb-2" rel="tooltip" title="approve testimony" data-placement="left">
                                                                <span class="btn-label">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                        @endif
                                                        
                                                            </button>
                                                    </form>
                                                    
                                                    <a data-toggle="modal" data-target="#edit-testimony{{$testimony->id}}" href="#pablo" class="btn btn-info btn-outline mb-2 rounded" rel="tooltip" title="edit testimony" data-placement="left" >
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>
                                                    </a>
                                                    <div class="modal fade modal-primary" id="edit-testimony{{$testimony->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-testimony{{$testimony->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <p>Edit Testimony</p>
                                                                </div>
                                                                <form class="d-inline" action="{{route('admin.testimony.update',$testimony)}}" method="POST">@csrf
                                                                    <div class="modal-body text-center">
                                                                        <div class="form-group">
                                                                            <input name="title" value="{{$testimony->title}}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <textarea name="body" class="form-control" rows="5" style="height: unset">{{$testimony->body}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">Update</button>
                                                                        <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="button" data-toggle="modal" data-target="#delete-testimony{{$testimony->id}}" class="btn btn-danger btn-outline rounded" rel="tooltip" title="delete testimony" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </button>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-testimony{{$testimony->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-testimony{{$testimony->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    
                                                                        <p>Delete Testimony</p>
                                                                    
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this testimony</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.testimony.delete',$testimony)}}" method="POST">@csrf
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
                                            <td colspan="4">No Testimony</td>
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
          