<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Fablab') }}</title>
    <link rel="shortcut icon" href="/images/fablab.png" type="image/x-icon">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- insert stylesheets here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/adminDashboard.css') }}" >
</head>

<body>
    <nav class="navbar p-2"style="background-color: #21364b">
        <div class="d-flex col-12 col-md-3 fs-6 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand text-primary" href="#" style="font-size: 12px">
            <img src="{{url('/images/fablab.png')}}" height="30" alt="fablablogo"
            loading="lazy" style="margin-top:-1px;"/>
                ISAT U-DTI FABRICATION LABORATORY
            </a>
            <button class="navbar-toggler d-md-none collapsed navbar-dark mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        {{-- <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div> --}}
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
           
            <div class="dropdown">
                <button class="btn dropdown-toggle btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    {{ session('name')}}
                  
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="{{url('/home')}}">Home</a></li>
                  <li><a class="dropdown-item" href="{{ route ('logout')}}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                  </li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row ">
          <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="mx-3">
              <h5 class="card-title">Navigation</h5>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item "><a class="text-decoration-none" href="{{ url('/dashboard/user/profile') }}">Dashboard</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="{{ url('/userside_pendingconsultation') }}">My Transactions</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="{{ url('/priceQoutation') }}">Price Qoutation</a></li>
                
              </ul>
            </div>
          </nav>
        </div>

      </div>
    </div>
    
    @yield('userDashboard')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<main class="py-4">
   
</main>
</body>
</html>
  