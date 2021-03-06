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
                                <li class="breadcrumb-item active" aria-current="page">My Addresses</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('user.dashboard_header')
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('user.dashboard_nav')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="dashboard-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title-tab">
                                        <h4><i class="uil uil-location-point"></i>My Address</h4>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Billing Addresses</h4>
                                        </div>
                                        <div class="address-body">
                                            <a href="#" class="add-address add-billing-address hover-btn"
                                               data-toggle="modal"
                                               data-target="#address_model">Add Billing Address</a>
                                            @forelse($UserData->billingAddresses as $address)
                                                <div class="address-item">
                                                    <div class="address-dt-all">
                                                        <h4>{{$address->BillingTitle . ' '.$address->BillingFirstName . ' ' . $address->BillingLastName}}</h4>
                                                        <p>
                                                            <strong>Company
                                                                Name:</strong> {{$address->BillingCompanyName}}
                                                        </p>
                                                        <p>{{$address->BillingEmail}}</p>
                                                        <p>{{$address->BillingAddress1 . ' ' . $address->BillingAddress2}}</p>
                                                        <p>{{$address->BillingTownCity}}
                                                            , {{$address->BillingCountyState}}
                                                            , {{$address->BillingPostCode}}</p>
                                                        <p>{{$address->BillingMobile}}
                                                            , {{$address->BillingCountry}}</p>
                                                        <ul class="action-btns">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                   class="action-btn edit-billing-address"
                                                                   data-addressid="{{$address->ID}}"
                                                                   data-toggle="modal" data-target="#address_model">
                                                                    <i class="uil uil-edit"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"
                                                                   class="action-btn delete_address"
                                                                   data-addresstype="billing"
                                                                   data-addressid="{{$address->ID}}"><i
                                                                        class="uil uil-trash-alt"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="address-item"><p>No billing address added</p></div>.
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Delivery Addresses</h4>
                                        </div>
                                        <div class="address-body">
                                            <a href="#" class="add-address add-delivery-address hover-btn"
                                               data-toggle="modal"
                                               data-target="#address_model_delivery">Add Delivery Address</a>
                                            @forelse($UserData->deliveryAddresses as $address)
                                                <div class="address-item">
                                                    <div class="address-dt-all">
                                                        <h4>{{$address->DeliveryTitle . ' '.$address->DeliveryFirstName . ' ' . $address->DeliveryLastName}}</h4>
                                                        <p>
                                                            <strong>Company
                                                                Name:</strong> {{$address->DeliveryCompanyName}}
                                                        </p>
                                                        <p>{{$address->DeliveryEmail}}</p>
                                                        <p>{{$address->DeliveryAddress1 . ' ' . $address->DeliveryAddress2}}</p>
                                                        <p>{{$address->DeliveryTownCity}}
                                                            , {{$address->DeliveryCountyState}}
                                                            , {{$address->DeliveryPostCode}}</p>
                                                        <p>{{$address->DeliveryMobile}}
                                                            , {{$address->DeliveryCountry}}</p>
                                                        <ul class="action-btns">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                   class="action-btn edit-delivery-address"
                                                                   data-addressid="{{$address->ID}}"
                                                                   data-toggle="modal"
                                                                   data-target="#address_model_delivery"><i
                                                                        class="uil uil-edit"></i></a>
                                                            </li>
                                                            <li><a href="javascript:void(0);"
                                                                   class="action-btn delete_address"
                                                                   data-addresstype="delivery"
                                                                   data-addressid="{{$address->ID}}"><i
                                                                        class="uil uil-trash-alt"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="address-item"><p>No delivery address added</p></div>.
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="address_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog"
         aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content">
                    <div class="cate-header">
                        <h4 class="modal_heading">Add New Billing Address</h4>
                    </div>
                    <div class="add-address-form">
                        <div class="checout-address-step">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="" method="post" action="{{URL('/add_billing_address')}}"
                                          id="billing_address">
                                    @csrf
                                    <!-- Multiple Radios (inline) -->
                                        <div class="address-fieldset">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="hidden" id="BillingAddressID"
                                                               name="BillingAddressID" value="">
                                                        <label class="has-float-label validate-input">
                                                            <select class="form-control required validate-field"
                                                                    id="BillingTitle"
                                                                    name="BillingTitle">
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Mrs.">Mrs.</option>
                                                                <option value="Miss.">Miss.</option>
                                                                <option value="Dr.">Dr.</option>
                                                                <option value="Prof.">Prof.</option>
                                                                <option value="Rev.">Rev.</option>
                                                            </select>
                                                            <span>Billing Title</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingFirstName" name="BillingFirstName"
                                                                   type="text" placeholder="First Name"
                                                                   class="form-control required validate-field">
                                                            <span>First Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingLastName" name="BillingLastName"
                                                                   type="text" placeholder="Last Name"
                                                                   class="form-control required validate-field">
                                                            <span>Last Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingCompanyName" name="BillingCompanyName"
                                                                   type="text"
                                                                   placeholder="Company Name"
                                                                   class="form-control input-md">
                                                            <span>Company Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingMobile" name="BillingMobile"
                                                                   type="text"
                                                                   placeholder="Mobile Number"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Billing Mobile</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input"
                                                               data-validate="Please enter valid email">
                                                            <input id="BillingEmail" name="BillingEmail"
                                                                   type="email"
                                                                   placeholder="Email Address"
                                                                   class="form-control input-md required validate-field" readonly="readonly"
                                                            value="{{$UserData->UserEmail}}">
                                                            <span>Email Address</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingAddress1" name="BillingAddress1"
                                                                   type="text"
                                                                   placeholder="Address Line 1"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Address Line 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label">
                                                            <input id="BillingAddress2" name="BillingAddress2"
                                                                   type="text"
                                                                   placeholder="Address Line 2"
                                                                   class="form-control input-md">
                                                            <span>Address Line 2</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingTownCity" name="BillingTownCity"
                                                                   type="text"
                                                                   placeholder="Town / City"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Town / City</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingCountyState" name="BillingCountyState"
                                                                   type="text"
                                                                   placeholder="State / Province"
                                                                   class="form-control input-md required validate-field">
                                                            <span>County / State</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="BillingPostCode" name="BillingPostCode"
                                                                   type="text"
                                                                   placeholder="Post Code"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Post Code</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <select class="form-control required validate-field"
                                                                    id="BillingCountry"
                                                                    name="BillingCountry">
                                                                <option value="">Select Country</option>
                                                                <optgroup label="European Union">
                                                                    <option value="United Kingdom">United Kingdom
                                                                    </option>
                                                                    <option value="France">France</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Italy">Italy</option>
                                                                </optgroup>
                                                                <optgroup label="Asia">
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Pakistan">India</option>
                                                                    <option value="Pakistan">China</option>
                                                                </optgroup>
                                                                <optgroup label="ROW">
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="United States">United States</option>
                                                                </optgroup>
                                                            </select>
                                                            <span>Country</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group mb-0">
                                                        <div class="address-btns">
                                                            <button class="save-btn14 hover-btn btn-block"
                                                                    id="save_billing" data-action="" type="button">Add
                                                                Billing Address
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="address_model_delivery" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog"
         aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content">
                    <div class="cate-header">
                        <h4 class="modal_heading">Add New Delivery Address</h4>
                    </div>
                    <div class="add-address-form">
                        <div class="checout-address-step">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="" method="post" action="{{URL('/add_delivery_address')}}"
                                          id="delivery_address">
                                    @csrf
                                    <!-- Multiple Radios (inline) -->
                                        <div class="address-fieldset">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="hidden" id="DeliveryAddressID"
                                                               name="DeliveryAddressID" value="">
                                                        <label class="has-float-label validate-input">
                                                            <select class="form-control required" id="DeliveryTitle"
                                                                    name="DeliveryTitle">
                                                                <option value="Mr.">Mr.</option>
                                                                <option value="Mrs.">Mrs.</option>
                                                                <option value="Miss.">Miss.</option>
                                                                <option value="Dr.">Dr.</option>
                                                                <option value="Prof.">Prof.</option>
                                                                <option value="Rev.">Rev.</option>
                                                            </select>
                                                            <span>Title</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryFirstName" name="DeliveryFirstName"
                                                                   type="text" placeholder="First Name"
                                                                   class="form-control required validate-field">
                                                            <span>First Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryLastName" name="DeliveryLastName"
                                                                   type="text" placeholder="Last Name"
                                                                   class="form-control required validate-field">
                                                            <span>Last Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryCompanyName" name="DeliveryCompanyName"
                                                                   type="text"
                                                                   placeholder="Company Name"
                                                                   class="form-control input-md required">

                                                            <span>Company Name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryMobile" name="DeliveryMobile"
                                                                   type="text"
                                                                   placeholder="Mobile Number"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Mobile Number</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryEmail" name="DeliveryEmail"
                                                                   type="email"
                                                                   placeholder="Email Address"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Email Address</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryAddress1" name="DeliveryAddress1"
                                                                   type="text"
                                                                   placeholder="Address Line 1"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Address Line 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryAddress2" name="DeliveryAddress2"
                                                                   type="text"
                                                                   placeholder="Address Line 2"
                                                                   class="form-control input-md">
                                                            <span>Address Line 2</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryTownCity" name="DeliveryTownCity"
                                                                   type="text"
                                                                   placeholder="Town / City"
                                                                   class="form-control input-md required">
                                                            <span>Town / City</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryCountyState" name="DeliveryCountyState"
                                                                   type="text"
                                                                   placeholder="State / Province"
                                                                   class="form-control input-md required validate-field">
                                                            <span>State / Province</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <input id="DeliveryPostCode" name="DeliveryPostCode"
                                                                   type="text"
                                                                   placeholder="Post Code"
                                                                   class="form-control input-md required validate-field">
                                                            <span>Post Code</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="has-float-label validate-input">
                                                            <select class="form-control required validate-field"
                                                                    id="DeliveryCountry"
                                                                    name="DeliveryCountry">
                                                                <option value="">Select Country</option>
                                                                <optgroup label="European Union">
                                                                    <option value="United Kingdom">United Kingdom
                                                                    </option>
                                                                    <option value="France">France</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Italy">Italy</option>
                                                                </optgroup>
                                                                <optgroup label="Asia">
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Pakistan">India</option>
                                                                    <option value="Pakistan">China</option>
                                                                </optgroup>
                                                                <optgroup label="ROW">
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="United States">United States</option>
                                                                </optgroup>
                                                            </select>
                                                            <span>Country</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group mb-0">
                                                        <div class="address-btns">
                                                            <button class="save-btn14 hover-btn btn-block" type="button"
                                                                    id="save_delivery" data-action="">Add Delivery
                                                                Address
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
