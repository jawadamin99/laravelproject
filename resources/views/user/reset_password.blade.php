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
                                    <form action="{{URL('change_password_handler')}}" id="change_password_form" method="post" novalidate>
                                        @csrf
                                        <div class="form-title"><h6>Reset Password</h6></div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Please Enter Password">
                                                 <span class="btn-show-pass">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                                <input id="UserPassword" name="UserPassword" type="password"
                                                       placeholder="Password"
                                                       class="form-control validate-field">
                                                <span>New Password</span>
                                            </label>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <label class="has-float-label validate-input" data-validate="Password Not Matched">
                                                 <span class="btn-show-pass">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                                <input id="ConfirmPassword" name="ConfirmPassword" type="password"
                                                       placeholder="Password"
                                                       class="form-control validate-field">
                                                <span>Confirm Password</span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="ResetToken" value="{{$UserData->ResetToken}}" />
                                        <button class="login-btn hover-btn mb-5" type="button" id="change_password_btn">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
