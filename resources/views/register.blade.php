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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session('registered_email'))
                                        <div class="alert alert-success">
                                            <i class="fa fa-check-circle"></i> Registration Successful
                                            <p>Please check your email {{session('registered_email')}} and follow the link to activate your account</p>
                                        </div>
                                    @endif
                                    <form action="{{URL('register')}}" id="signup_form" method="post" novalidate>
                                        @csrf
                                        <div class="form-title"><h6>Sign Up</h6></div>
                                        <div class="form-group pos_rel">
                                            <input id="BillingFirstName" name="BillingFirstName" type="text"
                                                   placeholder="First name"
                                                   class="form-control lgn_input required"
                                                   value="{{old('BillingFirstName')}}">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="BillingLastName" name="BillingLastName" type="text"
                                                   placeholder="Last name"
                                                   class="form-control lgn_input required"
                                                   value="{{old('BillingLastName')}}">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="UserEmail" name="UserEmail" type="email"
                                                   placeholder="Email Address" class="form-control lgn_input required"
                                                   value="{{old('UserEmail')}}">
                                            <i class="uil uil-envelope lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="BillingMobile" name="BillingMobile" type="text"
                                                   placeholder="Mobile Number" class="form-control lgn_input required"
                                                   value="{{old('BillingMobile')}}">
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="UserPassword" name="UserPassword" type="password"
                                                   placeholder="Password"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="ConfirmPassword" name="ConfirmPassword" type="password"
                                                   placeholder="Confirm Password"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <button class="login-btn hover-btn" type="submit">Sign Up</button>
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
