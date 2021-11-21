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
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/admin-style.css')}}" rel="stylesheet">
    <!-- Vendor Stylesheets -->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Custom Admin StyleSheet -->
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="{{asset('admin/css/admin-custom.css')}}" rel="stylesheet">
</head>

<body class="bg-sign">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header card-sign-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                @if(session('error_message'))
                                    <div class="alert alert-danger">
                                        <p class="m-0">{{session('error_message')}}</p>
                                    </div>
                                @endif
                                <form id="login_form" method="post" novalidate action="">
                                    <div class="form-group">
                                        <label class="form-label has-float-label validate-input"
                                               data-validate="Please Enter Email Address">
                                            <input class="form-control py-3 validate-field" id="AdminEmail"
                                                   name="AdminEmail" type="email"
                                                   placeholder="Enter email address">
                                            <span>Email Address</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label has-float-label validate-input"
                                               data-validate="Enter a valid Password">
                                            <span class="btn-show-pass">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            <input class="form-control py-3 validate-field" id="AdminPassword"
                                                   name="AdminPassword"
                                                   type="password"
                                                   placeholder="Enter password">
                                            <span>Password</span>
                                        </label>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-sign hover-btn" type="button" id="login_btn">Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL('assets/js/jquery.countdown.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('js/forms.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>

</body>
</html>
