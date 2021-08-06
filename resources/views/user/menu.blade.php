<div class="dashboard-sidebar">
    <div class="profile-top">
        <div class="profile-image">
            @if($user->image)
            <img src="{{asset('storage/users/'.$user->image)}}" alt="" class="img-fluid">
            @else
            <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="" class="img-fluid">
            @endif
        </div>
        <div class="profile-detail">
            <h5>{{$user->name}}</h5>
            
            <h6>{{$user->email}}</h6>
        </div>
    </div>
    <div class="faq-tab">
        <ul class="nav nav-tabs" id="top-tab" role="tablist">
            <li class="nav-item"><a  class="nav-link active" href="{{route('user.home')}}">dashboard</a></li>
            <li class="nav-item"><a  class="nav-link" href="{{route('user.orders')}}">Orders</a>
            </li>
            <li class="nav-item"><a  class="nav-link" href="{{route('user.transactions')}}">Transactions</a>
            </li>
            {{-- <li class="nav-item"><a  class="nav-link" href="#preferences">Preferences</a></li> --}}
            <li class="nav-item"><a  class="nav-link" href="{{route('user.profile')}}">Profile</a>
            <li class="nav-item"><a  class="nav-link" href="{{route('user.settings')}}">Settings</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" style="cursor:pointer;" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>