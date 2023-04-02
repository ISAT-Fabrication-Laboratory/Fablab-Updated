<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Fablab') }}</title>
  <link rel="shortcut icon" href="/images/fablab.png" type="image/x-icon">
  <!-- insert stylesheets here -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/adminDashboard.css') }}">
  <link href="{{ asset('storage/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/css/sweetalert2.min.css') }}" rel="stylesheet">
</head>

<body>
  <nav class="navbar p-2 sticky-top" style="background-color: #21364b">
    <div class="d-flex col-12 col-md-3 fs-6 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand text-primary" href="#" style="font-size: 12px">
        <img src="/images/fablab.png" height="30" alt="fablablogo" loading="lazy" style="margin-top:-1px;" />
        ISAT U-DTI FABRICATION LABORATORY
      </a>
      <button class="navbar-toggler d-md-none collapsed navbar-dark mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

      <div class="dropdown">
        <button class="btn dropdown-toggle btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
          {{ session('name')}}

        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="{{ url('/adminchat') }}">Messages</a></li>
          <div class=" dropdown-divider">
          </div>
          <li><a class="dropdown-item logout" href="{{ url('/logout')}} ">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('dashboard/adminHome')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="ml-2">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{url('dashboard/admin_panel/p_consultation')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                  <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                <span class="ml-2">Transactions</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link button-active" href="{{url('/Products')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="ml-2">Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span class="ml-2">Customers</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard/admin_panel/generate_reports')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                  <line x1="18" y1="20" x2="18" y2="10"></line>
                  <line x1="12" y1="20" x2="12" y2="4"></line>
                  <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg>
                <span class="ml-2">Reports</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                  <polyline points="2 17 12 22 22 17"></polyline>
                  <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                <span class="ml-2">Integrations</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <main class="pb-4">
    @yield('admincontent')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  <script src="{{ asset('storage/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('storage/js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('storage/js/notification.js') }}"></script>
  <script src="{{ asset('storage/js/transition.js') }}"></script>
  <script>
    function loaduser() {
      // setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("customershow").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo url('/userget') ?>", true);
      xhttp.send();
      // }), 10000;
    }
    loaduser();
  </script>
  <script>
    function loadmessagesadmin() {
      // setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("messagesadmin").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo url('/getmessagesadmin') ?>", true);
      xhttp.send();
      // }), 2000;
    }
    loadmessagesadmin();
  </script>

  <script>
   const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

});

  </script>
</body>

</html>