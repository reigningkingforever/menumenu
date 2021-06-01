@extends('frontend.layouts.app')
@push('styles')

@endpush
		
{{-- <body class="post-template-default single single-post postid-53 single-format-standard evision-right-sidebar"> --}}
@section('main')
	<section class="wrapper wrap-content">
		<div class="site-content">
			<div class="row d-flex justify-content-center">
				<div class="col-md-9">
					<div class="card">
						<div class="card-body d-flex flex-column justify-content-between">
							<h1 class="text-center">Watch Live Service</h1>
							@if(!isset($program) || !$program->streaming)
							<h6 class="m-5 text-center">No Live Streaming Service ongoing at this moment</h6>
							@else
							<iframe src="{{$program->streaming}}" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							@endif
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
@endsection
		
		
