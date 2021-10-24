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
                                    @if(session('login_msg'))
                                        <div class="alert alert-danger">
                                            <p>{{session('login_msg')}}</p>
                                        </div>
                                    @endif
                                    <form action="{{URL('login')}}" id="login_form" method="post" novalidate>
                                        @csrf
                                        <div class="form-title"><h6>Sign In</h6></div>
                                        <div class="form-group pos_rel">
                                            <input id="UserEmail" name="UserEmail" type="email"
                                                   placeholder="Email Address" class="form-control lgn_input required"
                                                   value="{{old('UserEmail')}}">
                                            <i class="uil uil-envelope lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="UserPassword" name="UserPassword" type="password"
                                                   placeholder="Password"
                                                   class="form-control lgn_input required">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <button class="login-btn hover-btn" type="submit">Sign In</button>
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
