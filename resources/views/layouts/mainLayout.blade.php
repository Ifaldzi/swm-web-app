<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WALL-E</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.3.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top bg-success">
    <div class="d-flex justify-content-end align-items-center">
      <div class="container d-flex justify-content-start ms-4">
      <h1 class="logo "><a href="{{route('home')}}">WALL-E</a></h1>
      </div>
      <!-- <a href="" class="navbar-brand"> -->
        <!-- <img src="{{asset('assets/img/about.jpg')}}" alt="" class="d-inline-block align-text-top" width="30" height="24"> -->
      {{-- </a> --}}

      <nav id="navbar" class="navbar order-last order-lg-0 navbar-dark">
        <ul class = "me-1 text-center">
          <li><a href="{{route('home')}}" class="{{  Route::is('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{route('registration')}}" class = "{{  Route::is('registration') ? 'active' : ''  }}">REGISTRASI<br>PETUGAS</a></li>

          <li><a href="{{route('RuteTercepat')}}" class="{{  Route::is('RuteTercepat') ? 'active' : '' }}">RUTE TERCEPAT</a></li>
          <li><a href="{{route('LogSampah')}}"class="{{  Route::is('LogSampah') ? 'active' : '' }}">LOG PENGAMBILAN<br>TEMPAT SAMPAH</a></li>

          <li><a href="{{route('monitoring-sampah')}}" class="{{  Route::is('monitoring-sampah') ? 'active' : '' }}">MONITORING<br>TEMPAT SAMPAH</a></li>
          <li><a href="{{route('monitoring-truk')}}"class="{{  Route::is('monitoring-truk') ? 'active' : '' }}">MONITORING<br>TRUK</a></li>
          <li class="dropdown me-5">
            <a  href="#" role="button" class="nav-link dropdown" id="dropdownLogout" data-bs-toggle="dropdown" aria-expanded="false">
              <i class=" pe-5 bi bi-person-circle" style="font-size: 2em;"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="text-center">Administrator</li>
              <li><hr class="dropdown-divider"></li>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button class = "dropdown-item text-center" type = "submit" name = "logout">Logout</button>
                {{-- <li><a class="dropdown-item " href="#">Logout</a></li> --}}
              </form>
            </ul>
          </li>
        </ul>
        <div class="d-flex justif-content-end me-5">
        <i class="bi bi-list mobile-nav-toggle" style="font-size: 2.5em;  color: #fff;"></i>
        </div>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- content -->
    @yield('content')
  <!-- end content -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>WALL-E.Polban.JTK.2021</span></strong>. <br>All Rights Reserved
        </div>
    </div>
  </footer>
  <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
