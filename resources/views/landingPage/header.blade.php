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

      <a href="{{route('register-candidate')}}" class="get-started-btn scrollto">Preinscribirse</a>
    </div>
  </header><!-- End Header -->
