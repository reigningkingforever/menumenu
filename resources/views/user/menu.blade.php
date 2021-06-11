<div class="dashboard-sidebar">
    <div class="profile-top">
        <div class="profile-image">
            <img src="{{asset('img/avatar.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="profile-detail">
            <h5>Fashion Store</h5>
            <h6>750 followers | 10 review</h6>
            <h6>mark.enderess@mail.com</h6>
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
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#preferences">Preferences</a>
            </li>
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