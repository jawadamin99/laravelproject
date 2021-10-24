@extends('layouts.app')
@section('main_content')
    <div class="wrapper">
        <div class="gambo-Breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-group">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-dt">
                            <div class="user-img">
                                <img src="{{URL('assets/images/avatar/img-5.jpg')}}" alt="">
                                <div class="img-add">
                                    <input type="file" id="file">
                                    <label for="file"><i class="uil uil-camera-plus"></i></label>
                                </div>
                            </div>
                            <h4>{{$UserData->BillingFirstName .' ' . $UserData->BillingLastName}}</h4>
                            <p>{{$UserData->MobileNumber}}<a href="#"><i class="uil uil-edit"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="left-side-tabs">
                            <div class="dashboard-left-links">
                                <a href="{{URL('/')}}" class="user-item active"><i class="uil uil-apps"></i>Overview</a>
                                <a href="{{URL('/my_orders')}}" class="user-item"><i class="uil uil-box"></i>My
                                    Orders</a>
                                <a href="{{URL('/wishlist')}}" class="user-item"><i class="uil uil-heart"></i>Shopping
                                    Wishlist</a>
                                <a href="{{URL('/my_addresses')}}" class="user-item"><i
                                        class="uil uil-location-point"></i>My Address</a>
                                <a href="{{URL('/logout')}}" class="user-item"><i class="uil uil-exit"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="dashboard-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title-tab">
                                        <h4><i class="uil uil-apps"></i>Overview</h4>
                                    </div>
                                    <div class="welcome-text">
                                        <h2>Hi! John Doe</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Rewards</h4>
                                        </div>
                                        <div class="ddsh-body">
                                            <h2>6 Rewards</h2>
                                            <ul>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Won $2</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Won 40% Off</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Caskback $1</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="rewards-link5">+More</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">Rewards and Details <i
                                                class="uil uil-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Orders</h4>
                                        </div>
                                        <div class="ddsh-body">
                                            <h2>2 Recently Purchases</h2>
                                            <ul class="order-list-145">
                                                <li>
                                                    <div class="smll-history">
                                                        <div class="order-title">2 Items <span data-inverted=""
                                                                                               data-tooltip="2kg broccoli, 1kg Apple"
                                                                                               data-position="top center">?</span>
                                                        </div>
                                                        <div class="order-status">On the way</div>
                                                        <p>$22</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">All Orders <i
                                                class="uil uil-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Wallet</h4>
                                        </div>
                                        <div class="wllt-body">
                                            <h2>Credits $100</h2>
                                            <ul class="wallet-list">
                                                <li>
                                                    <a href="#" class="wallet-links14"><i class="uil uil-card-atm"></i>Payment
                                                        Methods</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="wallet-links14"><i class="uil uil-gift"></i>3
                                                        offers Active</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="wallet-links14"><i class="uil uil-coins"></i>Points
                                                        Earning</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">Rewards and Details <i
                                                class="uil uil-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
