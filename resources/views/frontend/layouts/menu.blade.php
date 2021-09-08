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
      <div class="collapse navbar-collapse row" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav col-xs-6 col-md-10 d-md-inline-flex justify-content-center">
          <li>
            <a @if(url()->current() == url('/')) href="#features" @else href="{{url('/')}}#features" @endif class="page-scroll">Services</a></li>
          <li>
            <a @if(url()->current() == url('/'))  href="#about" @else href="{{url('/')}}#about" @endif class="page-scroll">About</a></li>
          <li>
            <a @if(url()->current() == url('/'))  href="#restaurant-menu" @else href="{{url('/')}}#restaurant-menu" @endif class="page-scroll">Menu</a></li>
          
          <li><a href="#" class="page-scroll">Special Diet</a></li>
          <li><a href="{{route('blog')}}" class="page-scroll">Blog</a></li>
          
        </ul>
        <ul class="nav navbar-nav col-xs-6 col-md-1">
          @guest
            <li><a href="{{route('login')}}" class="page-scroll">Login</a></li>
          @else
          
          <li class="nav-item dropdown hidden-xs">
              
            <a class="nav-link dropdown-toggle pb-0 bg-transparent nohover " href="#" data-toggle="dropdown" role="button" aria-expanded="false">
              @if(Auth::user()->image)
                <img src="{{asset('storage/users/'.Auth::user()->image)}}" alt="" class="rounded-circle" height="34px">
                @else
                <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="" class="rounded-circle" height="34px">
              @endif
            </a>
            <!--DESKTOP USER MENU-->
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="nav-link" href="{{route('user.home')}}">Dashboard</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="">Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Saves</a></li> 
              <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Transactions</a></li> --}}
              <li class="nav-item"><a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                  document.getElementById('logout-form1').submit();">Log out</a>
                  <form id="logout-form1" action="{{route('logout')}}" method="POST" style="display: none;">
                      @csrf                                        </form>
              </li>
            </ul>
          </li>
          <div class="navbar-nav visible-xs">
            <li class="nav-item"><a class="nav-link" href="{{route('user.home')}}">Dashboard</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Saves</a></li> 
            <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Transactions</a></li> --}}
            <li class="nav-item"><a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                document.getElementById('logout-form2').submit();">Log out</a>
                <form id="logout-form2" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
          </div>
          @endguest
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
  </nav>