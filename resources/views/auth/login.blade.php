<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('storage/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Login</title>
    <style>
        body {
            background-color: #404040;
            height: 100vh;
        }

        .error {
            font-size: 10px;
        }

        .change {
            margin-left: -30px;
            cursor: pointer;
        }

        .login-credentials {
            text-indent: 13px;
        }

        @media(max-width:573px) {
            .col-sm-login {
                padding-top: 3px !important;
            }

            .col-sm-login-panel {
                margin-top: 1px !important;
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #21364b">
        <div class="container ">
            <a class="navbar-brand text-light" href="{{ url('/homepage') }}">
                {{ config('app.name', 'Fablab') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary mx-1 my-1" href="{{url('/register')}}">Register</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="row m-auto">
        <div class="col-sm-login-panel col-md-7 m-auto shadow rounded mt-5  g-0 rounded" style="background-color: #21364b">
            <div class="row m-auto g-0">
                <div class="col-md-6 p-5 rounded-start d-flex">
                    <img src="{{ asset('/images/login/Chatlogo.png') }}" class="img-fluid align-self-center">
                </div>
                <div class="col-sm-login col-md-6 p-5 rounded-end">
                    @if ($errors->has('_token'))
                    <p class="error text-danger m-0">
                        {{ $errors->first('_token') }}
                    </p>
                    @endif
                    <form method="post">
                        @csrf
                        <div class="col-4 m-auto mt-3">
                            <img src="{{ asset('/images/login/uplogin.png') }}" class="img-fluid">
                        </div>
                        <h5 class="h5 mb-3 text-white text-center">Log in to your account</h5>
                        <div class="form-group mx-2">
                            <label class="text-light">Email</label>
                            <div class="d-flex">
                                <i class="fa fa-user position-absolute align-self-center ms-2 border-end border-dark pe-1"></i>
                                <input class="login-credentials form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                            </div>
                            @if ($errors->has('email'))
                            <p class="error text-danger m-0">
                                {{ $errors->first('email') }}
                            </p>
                            @endif
                        </div>
                        <div class="form-group mb-4 mx-2">
                            <label class="text-light">Password</label>
                            <div class="d-flex">
                                <i class="fa fa-lock align-self-center ms-2 position-absolute border-end border-dark pe-1"></i>
                                <input type="password" class="login-credentials form-control align-self center" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password">
                                <i class="change text-secondary fa fa-eye align-self-center"></i>
                            </div>
                            @if ($errors->has('password'))
                            <p class="error text-danger m-0">
                                {{ $errors->first('password') }}
                            </p>
                            @endif
                        </div>
                        <div class="row m-auto mx-2">
                            <button class="btn btn-primary" name="signin">Login</button>
                            <div class="d-flex justify-content-center mt-3">
                                <p class="text-white">No Account? <a href="<?php echo url('/register'); ?>" class="text-center text-decoration-none pe-auto">Register</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('storage/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $('.change').on('click', function() {
        if ($('#password').prop('type') === 'password') {
            $('#password').prop('type', 'text');
        } else {
            $('#password').prop('type', 'password');
        }
    });
</script>

</html>