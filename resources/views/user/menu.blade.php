<div class="dashboard-sidebar">
    <div class="profile-top">
        <div class="profile-image">
            @if($user->media)
            <img src="{{asset('storage/users/'.$user->media->name)}}" alt="" class="img-fluid">
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
            <li class="nav-item"><a data-toggle="tab" class="nav-link active"
                    href="#dashboard">dashboard</a></li>
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#orders">Orders</a>
            </li>
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#transactions">Transactions</a>
            </li>
            {{-- <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#preferences">Preferences</a></li> --}}
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#profile">Profile</a>
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