<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $pageTitle }} |Sortcut Nepal</title>
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

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Reset Password</h5>
                                        <p>Reset Password with {{ config('app.name') }}.</p>
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
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-warning text-center mb-4" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger text-center mb-4" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form-horizontal" novalidate method="POST"
                                    action="{{ route('forgot.password.post') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="useremail"
                                            placeholder="Enter email" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Reset</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{ route('auth.login.show') }}" class="fw-medium text-primary">
                                Sign In here</a> </p>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ config('app.name') }}. Crafted with <i
                            class="mdi mdi-heart text-danger"></i> by <a href="https://www.techcomnepal.com/"
                            target="_blank" style="color: #02a9f7">Tech
                            Community Nepal</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('auth/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('auth/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('cms/libs/js/feather.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('auth/assets/js/app.js') }}"></script>

</body>

</html>
