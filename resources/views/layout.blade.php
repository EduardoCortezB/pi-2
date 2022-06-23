<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CELUT - @yield('title')</title>
  <meta content="@yield('title-description')" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">

    @include('landingPage.styles')

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      {{-- <h1 class="logo me-auto" style="font-size:25px"><a href="/">Centro de Lenguas de la Uttn<span></span></a></h1> --}}
      <a href="/" class="logo me-auto"><img src="{{ asset('img/logo.jpeg') }}" alt="" style="width: 150px; height: 200px"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Acerca de</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="/login#IniciarSesión">Iniciar Sesión</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="/register-candidat" class="get-started-btn scrollto">Preinscribirse</a>
    </div>
  </header><!-- End Header -->

  {{-- content of page --}}
  @yield('content-html')

@include('landingPage.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('landingPage.scripts')

  @yield('scripts')
  <!-- Template Main JS File -->

</body>

</html>
