@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="blog">
	<div class="container">
		<div id="row">
			<div class="col-md-12">
				<div class="team-img col-md-10 col-md-offset-1">
						<img src="{{$post->image}}" class="img-responsive">
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-10 col-md-offset-1">
					<div class="section-title">
					<h2 class="text-center">{{$post->title}}</h2>
					</div>
					{{$post->body}}
					<h5>Comments</h5>
					@if($post->comments->isNotEmpty())
					<ul class="comment-section">
						@foreach ($post->comments as $comment)
							<li>
								<div class="d-flex justify-content-start">
									@if($comment->user->image)
										<img src="{{asset('storage/user/photo/'.$comment->user->image)}}" alt="" class="rounded-circle" style="width:auto !important;height:40px;width:40px; margin-right:10px;">
									@else
										<img src="https://ui-avatars.com/api/?name={{$comment->user->name}}" alt="" class="rounded-circle" style="width:auto !important;height:40px;width:40px; margin-right:10px;">
									@endif
									<h6>{{$comment->user->name}} <span>( {{$comment->created_at->format('d M Y').' @ '.$comment->created_at->format('h:i A')}} )</span></h6>
								</div> 
									
								<div class="my-3">
									
									<p>{{$comment->body}}</p>
								</div>
								
							</li>
						@endforeach
						
					</ul>
					@endif
					<h4>Leave Your Comment</h4>
					@auth
						<form class="theme-form" action="{{route('user.comment')}}" method="POST">@csrf
							<input type="hidden" name="commentable_id" value="{{$post->id}}">
							<input type="hidden" name="commentable_type" value="App\Post">
							<textarea class="form-control" placeholder="Write Your Comment"
										id="comment" rows="6" name="body"></textarea>
							
									<button class="btn btn-solid" type="submit">Post Comment</button>
								
							
						</form>   
					@else
					<div class="card">
						<div class="card-body">
							<a href="{{route('login')}}"><u>Click here to Sign-in to add your comments</u></a>
						</div>
					</div>
						
					@endauth
				</div>
			</div>
			
		</div>
		
		
	</div>
</div>
@endsection