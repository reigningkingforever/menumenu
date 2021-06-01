@extends('frontend.layouts.app')

@push('styles')
<!--owl carousel css -->
<link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.css')}}" media="all" />
<link rel="stylesheet" href="{{asset('vendors/magnific/magnific-popup.css')}}" media="all" />
<link id="cbx-style" data-layout="1" rel="stylesheet" href="{{asset('frontend/css/gallery_page.css')}}" media="all" />
@endpush
@section('main')
<section id="page-content-wrap">
	<div class="single-gallery-wrap section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Gallery Menu Start -->
					<div class="gallery-menu text-center mt-3">
						<span class="active" data-filter="*">All</span>
						<span data-filter=".photo">Photo</span>
						<span data-filter=".event">Video</span>
					</div>
					<!-- Gallery Menu End -->
					
					<!-- Gallery Item content Start -->
						<div class="row gallery-gird">
							@forelse ($galleries as $gallery)
							
								@if ($gallery->media->format == "image")
									<!-- Single Gallery Start -->
									<div class="col-lg-3  col-sm-6 photo">
										<div class="single-gallery-item" style="background: url({{asset('storage/images/'.$gallery->media->name)}});background-size: cover;background-position: center center;background-repeat: no-repeat;">
											<div class="gallery-hvr-wrap">
												<div class="gallery-hvr-text">
													<h4>{{$gallery->title}}</h4>
													<p class="small">{{$gallery->description}}</p>
													<p class="small">{{$gallery->created_at->format('d M, Y')}}</p>
												</div>
												<a href="{{asset('storage/images/'.$gallery->media->name)}}" class="btn-zoom image-popup">
													<img src="{{asset('frontend/img/zoom-icon.png')}}" alt="a">
												</a>
											</div>
										</div>
									</div>
									<!-- Single Gallery End -->
								@else
									<!-- Single Gallery Start -->
									<div class="col-lg-3  col-sm-6 event">
										<div class="single-gallery-item video" style="background: url({{asset('frontend/img/gallery/gellary-img-2.jpg')}});background-size: cover;background-position: center center;background-repeat: no-repeat;">
											<a href="{{asset('storage/videos/'.$gallery->media->name)}}?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1"
											class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
										</div>
									</div>
									<!-- Single Gallery End -->
									
								@endif

							@empty
								
							@endforelse
							

						</div>
					<!-- Gallery Item content End -->
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 text-center">
					{{-- <a href="#" class="btn btn-brand btn-loadmore">Load More Photo</a> --}}
				</div>
			</div>
		</div>
	</div>
</section>

{{-- <section class="wrapper wrap-content">
	<div class="site-content">
		<div class="row">
			
		</div>
	</div>
</section> --}}
@endsection
@push('scripts')
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('vendors/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendors/magnific/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('vendors/smooth-scroll/jquery.smooth-scroll.min.js')}}"></script>
<script src="{{asset('frontend/js/gallery_page.js')}}"></script>
@endpush