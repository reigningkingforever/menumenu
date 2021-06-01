<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MenuMenu</title>
<meta name="description" content="MenuMenu is a food cooking and distribution service firm that caters to individuals, offices,schools, events and ceremonies.etc.. 
Varieties of food served includes local dishes, intercontinental dishes, pastries and snacks etc.">
<meta name="author" content="MenuMenu">
<meta name="keyword" content="buy food,food online, online food">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/apple-touch-icon-114x114.png')}}">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="{{asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

<link rel="stylesheet" href="{{asset('css/shop.css')}}">
@stack('styles')
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
@include('frontend.layouts.menu')
@if(url()->current() == url('/'))<!-- Header -->
    @include('frontend.layouts.header')
@endif
@yield('main')
@include('frontend.layouts.footer')

<script type="text/javascript" src="{{asset('js/jquery.1.11.1.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/SmoothScroll.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jqBootstrapValidation.js')}}"></script> 
{{-- <script type="text/javascript" src="{{asset('js/contact_me.js')}}"></script>  --}}
<script type="text/javascript" src="{{asset('js/aos.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/filter.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('js/menu.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('js/jquery.simplePagination.js')}}"></script>
<script type="text/javascript" src="{{asset('js/paginate-script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
@stack('scripts')
</body>
</html>
