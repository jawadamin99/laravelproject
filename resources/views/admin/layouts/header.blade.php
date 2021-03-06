<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gambo Supermarket Admin</title>

    <!-- Vendor Stylesheets -->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/admin-style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/admin-custom.css')}}" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
    <a class="navbar-brand logo-brand" href="index.html">Gambo Supermarket</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
    </button>
    <a href="{{url('/')}}" class="frnt-link" target="_blank"><i
            class="fas fa-external-link-alt"></i>Home</a>
    <ul class="navbar-nav ml-auto mr-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item admin-dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item admin-dropdown-item" href="#">Change Password</a>
                <a class="dropdown-item admin-dropdown-item" href="{{route('admin.logout')}}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link active" href="{{route('admin')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                       aria-expanded="false" aria-controls="collapseProducts">
                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                        Products
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseProducts" aria-labelledby="headingTwo"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link sub_nav_link" href="#">All Products</a>
                            <a class="nav-link sub_nav_link" href="#">Add Product</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                       aria-expanded="false" aria-controls="collapseCategories">
                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                        Categories
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCategories" aria-labelledby="headingTwo"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link sub_nav_link" href="#">All Categories</a>
                            <a class="nav-link sub_nav_link" href="{{route('admin.addCategory')}}">Add Category</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                        Orders
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Customers
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                        Offers
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                        Menu
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
                       aria-expanded="false" aria-controls="collapseSettings">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Settings
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseSettings" aria-labelledby="headingTwo"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link sub_nav_link" href="#">General Settings</a>
                            <a class="nav-link sub_nav_link" href="#">Payment Settings</a>
                            <a class="nav-link sub_nav_link" href="#">Email Settings</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
