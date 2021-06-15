@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="blog">
	<div class="container">
	  <div id="row">
		  <div class="col-md-12">
			  <div class="team-img col-md-10 col-md-offset-1">
				  <img src="{{asset('storage/posts/'.$post->media->name)}}" alt="...">
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