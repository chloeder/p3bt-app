<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        P3BT APP
    </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/src/assets/css/demo_1/style.css" />
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('img/logo-p3bt.png') }}" />
</head>

<body>
    <div class="authentication-theme auth-style_1">
        <div class="row">
            <div class="col-12 logo-section">
                <a href="{{ route('register') }}" class="logo">
                    <img src="{{ asset('img/logo-p3bt.png') }}" alt="logo" />
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                                <form action="{{ route('register.auth') }}" method="POST">
                                    @csrf
                                    <div class="form-group input-rounded">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" />
                                        @error('password')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-block">
                                        Daftar
                                    </button>
                                </form>
                                <div class="signup-link">
                                    <p>Sudah punya akun?</p>
                                    <a href="{{ route('login') }}">Login Disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth_footer">
            <p class="text-muted text-center">REGISTER</p>
        </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('admin') }}/src/assets/vendors/js/core.js"></script>
    <script src="{{ asset('admin') }}/src/assets/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('admin') }}/src/assets/js/template.js"></script>
    <!-- endbuild -->
</body>

</html>
