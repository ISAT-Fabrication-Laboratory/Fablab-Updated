<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('storage/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/sweetalert2.min.css') }}" rel="stylesheet">
    <title>Register</title>
    <style>
        @media(max-width:573px) {
            .register-sm {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }

        .img-height {
            height: 150px !important;
            overflow: hidden;
        }

        .error {
            font-size: 11px;
        }

        label {
            color: white;
        }

        /* @media(max-width:573px) {
            .previewContainer {
                width: 276px !important;
            }
        } */
        #previewImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .uploadImage {
            cursor: pointer;
        }

        body {
            background-color: #374a5d;
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
    <nav class="navbar navbar-expand-md navbar-light sticky-top shadow-sm" style="background-color: #21364b">
        <div class="container ">
            <a class="navbar-brand text-light" href="{{ url('/') }}">
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
                        <a class="btn btn-primary mx-1 my-1" href="{{url('/login')}}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-10 m-auto my-3 shadow rounded mt-1" style="background-color: #21364b;">
        <div class="row m-auto g-0">
            <div class="col-md-5 d-flex justify-content-center py-3 ps-3 pe-2">
                <img src="{{ asset('/images/login/Chatlogo.png') }}" class="img-fluid align-self-center">
            </div>
            <div class="register-sm col-md-7 py-5 pe-5 ps-1">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-auto d-flex">
                        <div class="col-md-4 rounded">
                            <label for="img" class="d-block" style="font-size:12px; cursor: pointer;">Click to add Profile</label>
                            <input type="file" name="picture" accept="image/*" value="{{ old('picture') }}" id="img" onchange="showPreview(event);" style="display:none; ">
                            <div class="img-height col-md-12 rounded border">
                                <img id="previewImage" src="{{ asset('storage/img/placeholderuser.png') }}" class="img-fluid rounded">
                            </div>
                            @if ($errors->has('picture'))
                            <p class="error text-danger m-0">
                                {{ $errors->first('picture') }}
                            </p>
                            @endif
                        </div>
                        <div class="col-md-8 align-self-end">
                            <div class="form-group mb-2">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                                @if ($errors->has('name'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('name') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Birthdate</label>
                                <input class="form-control" type="date" name="birthdate" value="{{ old('birthdate') }}">
                                @if ($errors->has('birthdate'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('birthdate') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-auto mt-2">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Organization</label>
                                <input class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Organization">
                                @if ($errors->has('organization'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('organization') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Occupation</label>
                                <input class="form-control" name="occupation" value="{{ old('occupation') }}" placeholder="Occupation ">
                                @if ($errors->has('occupation'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('occupation') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Street</label>
                                <input class="form-control" name="street" value="{{ old('street') }}" placeholder="Street">
                                @if ($errors->has('street'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('street') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Municipality</label>
                                <input class="form-control" name="municipality" value="{{ old('municipality') }}" placeholder="Municipality">
                                @if ($errors->has('municipality'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('municipality') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Province/City</label>
                                <input class="form-control" name="province" value="{{ old('province') }}" placeholder="Province/City">
                                @if ($errors->has('province'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('province') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Contact Number</label>
                                <input class="form-control" name="contact_number" value="{{ old('contact_number') }}" placeholder="+63">
                                @if ($errors->has('contact_number'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('contact_number') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@gmail.com">
                            @if ($errors->has('email'))
                            <p class="error text-danger m-0">
                                {{ $errors->first('email') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
                                @if ($errors->has('password'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Re-enter Password</label>
                                <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Re-enter password">
                                @if ($errors->has('password_confirmation'))
                                <p class="error text-danger m-0">
                                    {{ $errors->first('password_confirmation') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- roles -->
                    <input type="hidden" name="type" value="0">
                    <div class="row m-auto">
                        <div class="col-md-12">
                            <div class="row m-auto">
                                <button class="btn btn-primary" type="submit" name="signup">Register</button>
                            </div>
                        </div>
                        {{-- <div class="d-flex justify-content-center mt-3">
                            <p class="text-white">Already have an Account? <a href="<?php echo url('/login'); ?>" class="text-center text-decoration-none pe-auto">Sign in</a></p>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('storage/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('storage/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('storage/js/notification.js') }}"></script>
<script src="{{ asset('storage/js/transition.js') }}"></script>
<script>
    var messagesuccess = "{{ Session::get('success') }}";
    var messagefailed = "{{ Session::get('success') }}";
</script>

@if (Session::has('success'))
<script>
    success();
</script>
@endif

@if (Session::has('failed'))
<script>
    failed();
</script>
@endif

</html>