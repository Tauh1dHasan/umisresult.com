<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{$global_setting->title ?? ""}}" name="description" />
        <meta content="{{$global_setting->title ?? ""}}" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <!-- App favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('login-assets/frontend-assets/images/favicon_io/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('login-assets/frontend-assets/images/favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('login-assets/frontend-assets/images/favicon_io/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('login-assets/frontend-assets/images/favicon_io/site.webmanifest') }}">

        <!-- Page title -->
        <title>{{$global_setting->title ?? ""}} @yield('title', 'Login')</title>

        <link href="{{ asset('login-assets/admin-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('login-assets/admin-assets/assets/css/login-app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{ asset('login-assets/admin-assets/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{ asset('login-assets/admin-assets/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
        <link href="{{ asset('login-assets/admin-assets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <noscript>
            <style type="text/css">
                .javascript {display:none;}
                .noscriptmsg{
                    display: flex;
                    justify-content: center;
                    font-size: 35px;
                    padding: 29px;
                }
            </style>
            <div class="noscriptmsg">
                You don't have javascript enabled.
            </div>
        </noscript>
        <style>
            .form-control {
                height: 52px;
            }
            .form-group label {
                font-size: 22px;
                font-weight: normal;
                color: #000;
            }
            button.btn.btn-dark.btn-block{
                font-size: 22px;
            }
            a.text-black-50 {
                font-size: 18px;
                text-align: left;
                float: left;
                display: block;
                margin-top: 10px;
                color: #0499ab !important;
            }
        </style>
    </head>

    <body class="authentication-bg authentication-bg-patternl" style="background: url('{{ asset('login-assets/frontend-assets/images/cashewnut.jpeg') }}') no-repeat center center / cover;">
        {{-- @include('alerts.alert') --}}
        <div class="account-pages mt-5 mb-5 javascript">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-pattern" style="margin-top: 5%; border-radius: 20px;">

                            <div class="card-body p-4">
                                <img src="{{asset('login-assets/frontend-assets/images/dae_logo.png')}}" alt="DAE logo" width="120px;" style="display: block; margin-left:auto; margin-right: auto;" class="text-center">
                                <div class="w-100 pb-2">
                                    <div class="auth-logo">
                                        <a href="" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <h2><b>লগইন</b></h2>
                                            </span>
                                        </a>

                                        {{-- <a href="" class="logo logo-light">
                                            <span class="logo-lg">
                                                <h2><b>লগইন</b></h2>
                                            </span>
                                        </a> --}}
                                    </div>

                                </div>
                                @if($errors->any())
                                    <h5 class="text-danger">{{$errors->first()}}</h5>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">ই-মেইল</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ই-মেইল ঠিকানা লিখুন" value="{{ old('email') }}" autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- <input type="hidden" name="latitude" id="latitude">
                                    <input type="hidden" name="longitude" id="longitude"> -->
									<input type="hidden" name="latitude" id="latitude" value="23.8022515">

									<input type="hidden" name="longitude" id="longitude" value="90.3452524">

                                    <div class="form-group mb-3">
                                        <label for="password">পাসওয়ার্ড</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="পাসওয়ার্ড লিখুন" autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group mb-0 text-center">
                                        <div class="row">
                                            <div class="col-md-6"><a href="{{ route('password.request') }}" class="text-black-50">আপনার পাসওয়ার্ড ভুলে গেছেন?</a></div>
                                            <div class="col-md-6"><button class="btn btn-success btn-block" type="submit"> লগইন </button></div>
                                        </div>

                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        {{-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p></p>
                                <p class="text-white-50">Don't have an account? <a href="javascript:void(0)" class="text-white ml-1" data-toggle="modal" data-target="#signup-alert-modal"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->





        <footer class="footer footer-alt">
            <?php echo date('Y');?> © ServiceEngine LTD.
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('login-assets/admin-assets/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('login-assets/admin-assets/assets/js/app.min.js') }}"></script>

    </body>
</html>
