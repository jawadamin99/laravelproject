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
                                    <form action="{{URL('login')}}" id="login_form" method="post" novalidate>
                                        @csrf
                                        <div class="form-title"><h6>Sign In</h6></div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Enter Email Address">
                                                <input id="UserEmail" name="UserEmail" type="email"
                                                       placeholder="Email Address" class="form-control validate-field"
                                                       value="{{old('UserEmail')}}">
                                                <span>Email Address</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Enter Password">
                                                <input id="UserPassword" name="UserPassword" type="password"
                                                       placeholder="Password"
                                                       class="form-control validate-field">
                                                <span>Password</span>
                                            </label>
                                        </div>
                                        <button class="login-btn hover-btn" type="button" id="login_btn">Sign In</button>
                                    </form>
                                </div>
                                <div class="signup-link">
                                    <p>Don't have an account? - <a href="{{URL('register')}}">Sign Up Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
