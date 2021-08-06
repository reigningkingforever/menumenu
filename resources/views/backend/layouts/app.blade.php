<!DOCTYPE html>

 <html lang="en">
 
 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/img/apple-icon.png')}}">
     <link rel="icon" type="image/png" href="{{asset('backend/img/favicon.ico')}}">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>MenuMenu- Dashboard</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" />
     <link href="{{asset('backend/css/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
     <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
     <link href="{{asset('css/select2-bootstrap.min.css')}}" rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="{{asset('backend/css/demo.css')}}" rel="stylesheet" />
     @stack('styles')
 </head>
 
 <body>
     <div class="wrapper">
         @include('backend.layouts.mainmenu')
         <div class="main-panel">
             <!-- Navbar -->
             @include('backend.layouts.top')
             <!-- End Navbar -->
             @yield('main')
             @include('backend.layouts.footer')
         </div>
     </div>
     <!--   -->
     <!-- <div class="fixed-plugin">
     <div class="dropdown show-dropdown">
         <a href="#" data-toggle="dropdown">
             <i class="fa fa-cog fa-2x"> </i>
         </a>
 
         <ul class="dropdown-menu">
             <li class="header-title"> Sidebar Style</li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger">
                     <p>Background Image</p>
                     <label class="switch">
                         <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                     </label>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger background-color">
                     <p>Filters</p>
                     <div class="pull-right">
                         <span class="badge filter badge-black" data-color="black"></span>
                         <span class="badge filter badge-azure" data-color="azure"></span>
                         <span class="badge filter badge-green" data-color="green"></span>
                         <span class="badge filter badge-orange" data-color="orange"></span>
                         <span class="badge filter badge-red" data-color="red"></span>
                         <span class="badge filter badge-purple active" data-color="purple"></span>
                     </div>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="header-title">Sidebar Images</li>
 
             <li class="active">
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="{{asset('backend/img/sidebar-1.jpg')}}" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="{{asset('backend/img/sidebar-3.jpg')}}" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="..//assets/img/sidebar-4.jpg')}}" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="{{asset('backend/img/sidebar-5.jpg')}}" alt="" />
                 </a>
             </li>
 
             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                 </div>
             </li>
 
             <li class="header-title pro-title text-center">Want more components?</li>
 
             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                 </div>
             </li>
 
             <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>
 
             <li class="button-container">
                 <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                 <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
             </li>
         </ul>
     </div>
 </div>
  -->
 </body>
 <!--   Core JS Files   -->
 <script src="{{asset('backend/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('backend/js/core/popper.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('backend/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('js/select2.full.min.js')}}"></script>
 <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src="{{asset('backend/js/plugins/bootstrap-switch.js')}}"></script>
 <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
 <script src="{{asset('backend/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('backend/js/plugins/bootstrap-datetimepicker.js')}}"></script>

 <script src="{{asset('backend/js/plugins/bootstrap-notify.js')}}"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src="{{asset('backend/js/light-bootstrap-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src="{{asset('backend/js/demo.js')}}"></script>
 @stack('scripts')

 </html>
 