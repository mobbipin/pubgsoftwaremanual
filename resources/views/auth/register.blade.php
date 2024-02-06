<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $pageTitle }} | Sortcut Nepal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sortcut Nepal" name="description" />
    <meta content="Sortcut Nepal" name="author" />
    <!-- App favicon -->
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="shortcut icon" type="image/png">

    <!-- Bootstrap Css -->
    <link href="{{ asset('auth/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('auth/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('auth/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    {{-- Register Css --}}
    <link rel="stylesheet" href="{{ asset('auth/assets/css/register.css') }}">

    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: absolute;
            left: 30vw;
            z-index: 2;
        }

    </style>

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft text-white">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-white p-4">
                                        <h5 class="text-white">Free Register</h5>
                                        <p>Get your free account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('auth/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{ url('/') }}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="" novalidate
                                    action="{{ route('auth.register.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Enter email"
                                            value="{{ old('email') }}" required>

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" id="username" placeholder="Enter Username"
                                            value="{{ old('username') }}" required>

                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Enter name" value="{{ old('name') }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control password-field @error('password') is-invalid @enderror"
                                            id="userpassword" placeholder="Enter password" name="password" required>
                                        <span toggle="#userpassword"
                                            class="fa fa-fw fa-eye field-icon toggle-password-icon"></span>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Password Confirmation</label>
                                        <input type="password"
                                            class="form-control password-field @error('password') is-invalid @enderror"
                                            id="userconfirmpassword" placeholder="Retype Password Again Here..."
                                            name="password_confirmation" required>
                                        <span toggle="#userconfirmpassword"
                                            class="fa fa-fw fa-eye field-icon toggle-confirm-password-icon"></span>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row mt-4 text-center">
                                        <h5 class="font-size-14 mb-3"> Or Sign Up with</h5>

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ url('auth/google') }}"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>


                                    <div class="mt-4 d-grid">
                                        <button class="btn register-btn waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Already have an account ? <a href="{{ route('auth.login.show') }}"
                                    class="fw-medium text-secondary"> Login</a> </p>
                            Crafted with <i class="mdi mdi-heart text-secondary"></i> by <a
                                href="https://www.techcomnepal.com/" target="_blank" style="color: #02a9f7">Tech
                                Community Nepal
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('auth/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/feather.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('auth/assets/js/app.js') }}"></script>

    <script>
        $(".toggle-password-icon").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $(".toggle-confirm-password-icon").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

</body>

</html>
