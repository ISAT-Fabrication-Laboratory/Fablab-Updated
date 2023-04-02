<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/fablab.png" type="image/x-icon">
  <link href="{{ asset('storage/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
  <link href="{{ asset('storage/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('storage/css/sweetalert2.min.css') }}" rel="stylesheet">
  <title>Fablab</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top " style="background-color: #21364b ">
    <!-- Container wrapper -->
    <div class="container-fluid ">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#user_page" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse " id="user_page">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link text-primary fs-6" href="#">
          <img src="images/fablab.png" height="30" alt="fablablogo" loading="lazy" style="margin-top:-1px;" />
          ISAT U-DTI FABRICATION LABORATORY
        </a>
        <!-- Left links -->
        <ul class="navbar-nav px-auto mb-2 mb-lg-0 mx-auto nav-pills">
          <li class="nav-item">
            <a class="nav-link text-light" href="#services" aria-current="page" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#training" aria-current="page" href="#">Training</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" text-light href="#sample">Sample Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#achievements">Achievements</a>
          </li>
          <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center ">

        <!-- Notifications -->
        {{-- <div class="dropdown mx-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Notifications">
          <a class="d-flex align-items-center" href="#" role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell" style="color:#6c757d"></i>
            <span class="badge rounded-pill badge-notification bg-danger"></span>
          </a>
          <ul class="dropdown-menu  dropdown-menu-end ">
            <label for="" class="mx-1 my-3 fw-bold">Notifications</label>
            <li><a class="dropdown-item" href="#">Notification 1</a></li>
            <li><a class="dropdown-item" href="#">Notification 2</a></li>
            <li><a class="dropdown-item" href="#">Notification 3</a></li>
          </ul>
        </div> --}}
        <!--Messages-->
        <div class="message mx-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Messages">
          <a class="link-secondary me-3" href="<?php echo url('/userchat') ?>">
            <i class="fa fa-comment"></i>
            <span class="badge rounded-pill badge-notification bg-danger "></span>
          </a>
        </div>

        <!--Messages-->
        <!-- Avatar -->
        <div class="dropdown mx-0" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Notifications">
          <a class="nav-link dropdown-toggle btn btn-primary btn-sm text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ session('name')}}
          </a>
          <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{url ('dashboard/user/profile')}}">Profile</a>
            <div class=" dropdown-divider">
            </div>
            <a class="dropdown-item logout" href="<?php echo url('/logout'); ?>">Logout</a>
          </div>
        </div>


      </div>
  </nav>


  <!--Consultation Modal--->
  <!-- Modal -->

  <!--Consultation Modal-->


  <main>
    @yield('user_content')
  </main>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('storage/bootstrap/js/bootstrap.min.js') }}"></script>
  <!--Font Awesome--->
  <script src="https://use.fontawesome.com/c37f2157a7.js"></script>
  <script src="{{ asset('storage/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('storage/js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('storage/js/notification.js') }}"></script>
  <script src="{{ asset('storage/js/transition.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  <!--AOS--->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!--Tooltip--->
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>
  <script>
    function loaduser() {
      // setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("customershow").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo url('/adminget') ?>", true);
      xhttp.send();
      // }), 1000;
    }
    loaduser();
  </script>

<!--Jquery Clone--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>    
    <!-- Here clone method is called with the true passed value -->
    

  <script>
    function loadmessages() {
      // setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("messagesuser").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo url('/getmessagesuser') ?>", true);
      xhttp.send();
      // }), 2000;
    }
    loadmessages();
  </script>
</body>


</html>