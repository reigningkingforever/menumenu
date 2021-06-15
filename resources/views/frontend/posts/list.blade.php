@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>Our BLOG</h2>
	  	</div>
		<div class="row">
			@forelse ($posts as $post)
				<div class="col-xs-12 col-sm-4">
					<div class="features-item">
						
						<img src="{{asset('storage/posts/'.$post->media->name)}}" class="img-responsive" alt="">
						<h3><a href="{{route('post',$post)}}">{{$post->title}}</a></h3>
						<p class="text-left">{{Illuminate\Support\Str::words($post->body,10, '...')}}</p>
					</div>
				</div>
			@empty
				<div class="col-xs-12">
					<div class="features-item text-center">
						<h3>No Blog Post</h3>
					</div>
				</div>
			@endforelse
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="pagination-container light-theme simple-pagination">
					<ul class="pagination">
						<li class="active">
							<span class="current prev">«</span>
						</li>
						<li class="active">
							<span class="current">1</span>
						</li>
						<li>
							<a href="#page-2" class="page-link">2</a>
						</li>
						<li>
							<a href="#page-3" class="page-link">3</a>
						</li>
						<li>
							<a href="#page-4" class="page-link">4</a>
						</li>
						<li>
							<a href="#page-5" class="page-link">5</a>
						</li>
						<li>
							<a href="#page-6" class="page-link">6</a>
						</li>
						<li>
							<a href="#page-2" class="page-link next">»</a>
						</li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection