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
                                    <form action="{{URL('register')}}" id="signup_form" method="post">
                                        @csrf
                                        <div class="form-title"><h6>Sign Up</h6></div>
                                        <div class="form-group pos_rel">
                                            <input id="firstName" name="firstName" type="text" placeholder="First name"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="lastName" name="lastName" type="text" placeholder="Last name"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="emailAddress" name="emailAddress" type="email"
                                                   placeholder="Email Address" class="form-control lgn_input required">
                                            <i class="uil uil-envelope lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="phoneNumber" name="phoneNumber" type="text"
                                                   placeholder="Phone Number" class="form-control lgn_input required">
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="confirmPassword" name="confirmPassword" type="password"
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
