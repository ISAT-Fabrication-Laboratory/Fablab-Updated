<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/fablab.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <title>Fablab</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .maintxt {
        background-image: url(images/bg1.png);
        background-size: cover;
        background-attachment: fixed;
        height: 100vh;
        width: auto;
        background-image: center;
        background-repeat: no-repeat;
        z-index: -1;
    }

    .col,
    h1 {
        margin-top: 5rem;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #21364b ">
        <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Container wrapper -->
        <div class="collapse navbar-collapse" id="navbar">
            <!-- Navbar brand -->
            <a class="navbar-brand me-3"></a>
            <img src="images/fablab.png" height="30" alt="fablablogo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbar">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary fs-6" href="#">ISAT U-DTI FABRICATION LABORATORY</a>
                    </li>
                </ul>

                <div class="collapse navbar-collapse justify-content-center" id="navbar">
                    <!-- center links -->
                    <ul class="navbar-nav px-auto mb-2 mb-lg-0 mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#offer" aria-current="page" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" text-light href="#sample">Sample Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#achievements">Achievements</a>
                        </li>
                    </ul>
                </div>

                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <div class="hidden fixed top-0 right-0 px-2 py-1 sm:block">
                        <a href="{{ url('/login') }}" class="btn btn-primary px-3 me-2">Log in</a>
                    </div>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <script src="https://use.fontawesome.com/c37f2157a7.js"></script>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <main>
        @yield('content')
    </main>
</body>

</html>