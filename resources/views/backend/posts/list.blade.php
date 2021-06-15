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
                                <h4 class="card-title">Posts</h4>
                                <a href="{{route('admin.post.create')}}" class="btn btn-primary mr-5">Add New</a>
                            </div>
                            
                            <p class="card-category">Here is a subname for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($posts as $post)
                                        <tr>
                                            <td class="card-user">
                                                @if(!$post->media->first())
                                                    <img src="{{asset('img/no-image.jpg')}}" class="avatar rounded">
                                                @elseif($post->media->first()->format == "image")
                                                    <img @if($post->media->first()->external) src="{{$post->media->first()->name}}" @else src="{{asset('storage/images/'.$post->media->first()->name)}}" @endif class="avatar rounded">
                                                @else
                                                    <img src="{{asset('storage/videos/events-1.jpg')}}" class="avatar rounded">
                                                @endif
                                            </td>
                                            <td>
                                                <h4 class="mt-0"><a href="{{route('article',$post)}}">{{$post->title}}</a> 
                                                    <span class="small text-muted">
                                                        @if($post->status) <i class="fa fa-check"> @else <i class="fa fa-warning"> @endif </i></span>
                                                </h4>
                                                <h5>{{Illuminate\Support\Str::words($post->body,20, '...')}}</h5>
                                            </td>
                                            <td class="w-30">
                                                <span class="d-block">{{$post->tags}}</span>
                                                
                                            </td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <form class="d-inline" action="{{route('admin.post.duplicate',$post)}}" method="POST">@csrf
                                                        <button type="submit" class="btn btn-primary btn-outline mb-2 rounded" rel="tooltip" title="duplicate post" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-clone"></i>
                                                        </span>
                                                        
                                                        </button>
                                                    </form>
                                                    <a href="{{route('admin.post.edit',$post)}}" rel="tooltip" title="edit post" data-placement="left" class="btn btn-info btn-outline mb-2 rounded">
                                                        <span class="btn-label">
                                                            <i class="fa fa-pencil"></i>
                                                        </span>
                                                        
                                                    </a>
                                                    
                                                    <button type="button" data-toggle="modal" data-target="#delete-post{{$post->id}}" class="btn btn-danger btn-outline rounded" rel="tooltip" title="delete post" data-placement="left">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </button>
                                                    <div class="modal fade modal-mini modal-primary" id="delete-post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-post{{$post->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    
                                                                        <p>Delete Post</p>
                                                                   
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Are you sure you want to delete this post</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form class="d-inline" action="{{route('admin.post.delete',$post)}}" method="POST">@csrf
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
                                            <td colspan="4">No posts</td>
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