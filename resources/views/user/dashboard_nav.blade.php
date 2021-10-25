<div class="left-side-tabs">
    <div class="dashboard-left-links">
        <a href="{{URL('/my_account')}}" class="user-item {{request()->is('my_account') ? 'active':''}}"><i class="uil uil-apps"></i>Overview</a>
        <a href="{{URL('/my_orders')}}" class="user-item {{request()->is('my_orders') ? 'active':''}}"><i class="uil uil-box"></i>My
            Orders</a>
        <a href="{{URL('/wishlist')}}" class="user-item {{request()->is('wishlist') ? 'active':''}}"><i class="uil uil-heart"></i>Shopping
            Wishlist</a>
        <a href="{{URL('/my_addresses')}}" class="user-item {{request()->is('my_addresses') ? 'active':''}}"><i
                class="uil uil-location-point"></i>My Address</a>
        <a href="{{URL('/logout')}}" class="user-item"><i class="uil uil-exit"></i>Logout</a>
    </div>
</div>
