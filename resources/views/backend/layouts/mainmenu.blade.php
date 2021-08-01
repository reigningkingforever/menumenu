<div class="sidebar" data-image="{{asset('backend/img/sidebar-5.jpg')}}')}}">
    <!--
       Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

       Tip 2: you can also add an image using data-image tag
       -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text">
                MenuMenu
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.menu.list')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Menu</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.meal.list')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Meals</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.routine')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Routine</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.order.list')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Order</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.purchase.list')}}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Purchase</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.payment.list')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Payments</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.coupon.list')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Coupons</p>
                </a>
            </li>
            
            <li>
                <a class="nav-link" href="{{route('admin.post.list')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Posts</p>
                </a>
            </li>
            
            <li>
                <a class="nav-link" href="{{route('admin.review.list')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>Reviews</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.user.list')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('admin.setting.list')}}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Settings</p>
                </a>
            </li>
            
            
            
            {{-- <li class="nav-item active active-pro">
                <a class="nav-link active" href="#">
                    <i class="nc-icon nc-notification-70"></i>
                    <p>Settings</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>