@extends('layouts.app')
@section('main_content')
    <div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form mt-100">
                        <div class="sign-inner">
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    @if(session('registered_email'))
                                        <div class="alert alert-success">
                                            <i class="fa fa-check-circle"></i> Registration Successful
                                            <p>Please check your email {{session('registered_email')}} and follow the link to activate your account</p>
                                        </div>
                                    @endif
                                    <form action="{{URL('register')}}" id="register_form" method="post" novalidate>
                                        @csrf
                                        <div class="form-title"><h6>Sign Up</h6></div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="BillingFirstName" name="BillingFirstName" type="text"
                                                   placeholder="First name"
                                                   class="form-control required validate-field"
                                                   value="{{old('BillingFirstName')}}">
                                                <span>First Name</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="BillingLastName" name="BillingLastName" type="text"
                                                   placeholder="Last name"
                                                   class="form-control required validate-field"
                                                   value="{{old('BillingLastName')}}">
                                                <span>Last Name</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="UserEmail" name="UserEmail" type="email"
                                                   placeholder="Email Address" class="form-control required validate-field"
                                                   value="{{old('UserEmail')}}">
                                                <span>Email Address</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="BillingMobile" name="BillingMobile" type="text"
                                                   placeholder="Mobile Number" class="form-control required validate-field"
                                                   value="{{old('BillingMobile')}}">
                                            <span>Mobile Number</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="UserPassword" name="UserPassword" type="password"
                                                   placeholder="Password"
                                                   class="form-control required validate-field">
                                                <span>Password</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Fix">
                                            <input id="ConfirmPassword" name="ConfirmPassword" type="password"
                                                   placeholder="Confirm Password" class="form-control required validate-field">
                                                <span>Confirm Password</span>
                                            </label>
                                        </div>
                                        <button class="login-btn hover-btn" type="button" id="register_btn">Sign Up</button>
                                    </form>
                                </div>
                                <div class="signup-link">
                                    <p>I have an account? - <a href="{{URL('login')}}">Sign In Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
