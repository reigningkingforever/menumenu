<nav id="menu" class="navbar navbar-default navbar-fixed-top home">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
        </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          @if(url()->current() == url('/'))
          <li><a href="#features" class="page-scroll">Services</a></li>
          <li><a href="#about" class="page-scroll">About</a></li>
          <li><a href="#restaurant-menu" class="page-scroll">Menu</a></li>
          <li><a href="{{route('meals')}}" class="page-scroll">Meals</a></li>
          {{-- <li><a href="#subscribe" class="page-scroll">Subscribe</a></li> --}}
          <li><a href="{{route('blog')}}" class="page-scroll">Blog</a></li>
          @else
          <li><a href="{{url('/')}}#features" class="page-scroll">Services</a></li>
          <li><a href="{{url('/')}}#about" class="page-scroll">About</a></li>
          <li><a href="{{url('/')}}#restaurant-menu" class="page-scroll">Menu</a></li>
          <li><a href="{{route('meals')}}" class="page-scroll">Meals</a></li>
          <li><a href="{{route('blog')}}" class="page-scroll">Blog</a></li>
          @endif
        </ul>
        <ul class="nav navbar-nav pull-right">
          @guest
            <li><a href="{{route('login')}}" class="">Login</a></li>
          @else
            <li class="nav-item dropdown">
                <div class="hidden-xs">
                  <a class="nav-link dropdown-toggle pb-0 bg-transparent nohover" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                    <img src="{{asset('img/avatar.jpg')}}" class="rounded-circle" height="34px">
                  </a>
                  <!--DESKTOP USER MENU-->
                  <ul class="dropdown-menu">
                      <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Saves</a></li> 
                      <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Transactions</a></li>
                      <li class="nav-item"><a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Log out</a>
                          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                              @csrf                                        </form>
                      </li>
                  </ul>
                </div>
                <div class="hidden-lg">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button">
                      Oluwadamilola Idera
                    </a>
                    <!--MOBILE USER MENU-->
                    <ul class="nav navbar-nav">
                      <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Saves</a></li> 
                      <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Transactions</a></li>
                      <li class="nav-item"><a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Log out</a>
                          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                              @csrf                                        </form>
                      </li>
                    </ul>
                </div>   
            </li>
          @endguest
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
  </nav>