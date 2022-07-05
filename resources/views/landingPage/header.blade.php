<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      {{-- <h1 class="logo me-auto" style="font-size:25px"><a href="/">Centro de Lenguas de la Uttn<span></span></a></h1> --}}
      <a href="/" class="logo me-auto"><img src="{{ asset('img/logo.jpeg') }}" alt="" style="width: 150px; height: 200px"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Inicio</a></li>
          <li><a class="nav-link scrollto" href="/aboutus">Acerca de</a></li>
          <li><a class="nav-link scrollto" href="/#faq">FAQ</a></li>
          @if (auth()->user())
          <li class="dropdown"><a href="#"><span>Opciones</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">{{Auth::user()->email}}</a></li><hr>
              <li><a href="/panel">Panel</a></li>
              <li><a href="/log-out">Cerrar Sesión</a></li>
            </ul>
          </li>
          @endif

          @if (!auth()->user())
            <li><a class="nav-link scrollto" href="/login">Iniciar Sesión</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @if (!auth()->user())
        <a href="{{route('register-candidate')}}" class="get-started-btn scrollto">Registrarse</a>
      @endif
    </div>
  </header><!-- End Header -->
