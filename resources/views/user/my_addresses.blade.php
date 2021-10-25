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
                            <p>{{$UserData->UserEmail}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                <div class="col-lg-6 col-md-6">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Billing Addresses</h4>
                                        </div>
                                        <div class="address-body">
                                            <a href="#" class="add-address hover-btn" data-toggle="modal"
                                               data-target="#address_model">Add New Address</a>
                                            @isset($UserData->billingAddresses)
                                                @foreach($UserData->billingAddresses as $address)
                                                    <div class="address-item">
                                                        <div class="address-dt-all">
                                                            <h4>{{$address->BillingTitle . ' '.$address->BillingFirstName . ' ' . $address->BillingFirstName}}</h4>
                                                            <p>{{$address->AddressLine1 . ' ' . $address->AddressLine2}}</p>
                                                            <p>{{$address->BillingCompanyName}}</p>
                                                            <p>{{$address->BillingTownCity}},{{$address->BillingCountyState}},{{$address->BillingPostcode}},</p>
                                                            <p>{{$address->BillingMobile}},{{$address->BillingCountry}}</p>
                                                            <ul class="action-btns">
                                                                <li><a href="#" class="action-btn"><i
                                                                            class="uil uil-edit"></i></a>
                                                                </li>
                                                                <li><a href="#" class="action-btn"><i
                                                                            class="uil uil-trash-alt"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Delivery Addresses</h4>
                                        </div>
                                        <div class="address-body">
                                            <a href="#" class="add-address hover-btn" data-toggle="modal"
                                               data-target="#address_model">Add New Address</a>
                                            <div class="address-item">

                                                <div class="address-dt-all">
                                                    <h4>Home</h4>
                                                    <p>#0000, St No. 8, Shahid Karnail Singh Nagar, MBD Mall, Frozpur
                                                        road, Ludhiana, 141001</p>
                                                    <ul class="action-btns">
                                                        <li><a href="#" class="action-btn"><i class="uil uil-edit"></i></a>
                                                        </li>
                                                        <li><a href="#" class="action-btn"><i
                                                                    class="uil uil-trash-alt"></i></a></li>
                                                    </ul>
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
                            <h4>Add New Billing Address</h4>
                        </div>
                        <div class="add-address-form">
                            <div class="checout-address-step">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="" method="post" action="{{URL('/add_billing_address')}}">
                                            @csrf
                                            <!-- Multiple Radios (inline) -->
                                            <div class="address-fieldset">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="form-control required" id="BillingTitle"
                                                                    name="BillingTitle">
                                                                <option value="Mr">Mr</option>
                                                                <option value="Mrs">Mrs</option>
                                                                <option value="Miss">Miss</option>
                                                                <option value="Dr">Dr</option>
                                                                <option value="Prof">Prof</option>
                                                                <option value="Rev">Rev</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <input id="BillingFirstName" name="BillingFirstName"
                                                                   type="text" placeholder="First Name"
                                                                   class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <input id="BillingLastName" name="BillingLastName"
                                                                   type="text" placeholder="Last Name"
                                                                   class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input id="BillingCompanyName" name="BillingCompanyName"
                                                                   type="text"
                                                                   placeholder="Company Name"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <input id="BillingMobile" name="BillingMobile"
                                                                   type="text"
                                                                   placeholder="Mobile Number"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingEmail" name="BillingEmail"
                                                                   type="text"
                                                                   placeholder="Email Address"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingAddress1" name="AddressLine1"
                                                                   type="text"
                                                                   placeholder="Address Line 1"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingAddress2" name="AddressLine2"
                                                                   type="text"
                                                                   placeholder="Address Line 2"
                                                                   class="form-control input-md">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingTownCity" name="BillingTownCity"
                                                                   type="text"
                                                                   placeholder="Town / City"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingCountyState" name="BillingCountyState"
                                                                   type="text"
                                                                   placeholder="State / Province"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="BillingPostCode" name="BillingPostCode"
                                                                   type="text"
                                                                   placeholder="Pincode"
                                                                   class="form-control input-md required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="form-control required" id="BillingCountry"
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
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group mb-0">
                                                            <div class="address-btns">
                                                                <button class="save-btn14 hover-btn btn-block" type="submit">Add Billing Address</button>
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
