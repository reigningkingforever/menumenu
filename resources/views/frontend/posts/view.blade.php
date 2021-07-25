@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="blog">
	<div class="container">
	  <div id="row">
		  <div class="col-md-12">
			  <div class="team-img col-md-10 col-md-offset-1">
					@if(!$post->media->first())
						<img src="{{asset('img/no-image.jpg')}}" class="img-responsive">
					@elseif($post->media->first()->format == "image")
						<img @if($post->media->firstWhere('featured',true)->external) src="{{$post->media->first()->name}}" 
					@else src="{{asset('storage/posts/'.$post->media->firstWhere('featured',true)->name)}}" 
					@endif class="img-responsive">
					@else
						<img src="{{asset('storage/videos/events-1.jpg')}}" class="img-responsive">
					@endif
			  </div>
		</div>
		<div class="col-md-12">
		  <div class="col-md-10 col-md-offset-1">
			<div class="section-title">
			  <h2 class="text-center">{{$post->title}}</h2>
			</div>
			{{$post->body}}
		  </div>
		</div>
		
	  </div>
	</div>
</div>
@endsection