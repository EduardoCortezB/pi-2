  <!-- Navbar -->
  {{-- #1b1b1b --}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/panel" class="nav-link">Inicio</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
                    </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <div id="img-rend">
            <img src="{{asset('img/logo-01.png')}}" alt="Celut Logo" id="img-Nav" width="150px">
        </div>
      {{-- <span class="brand-text font-weight-light row justify-content-center">CELUT</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <p class="d-block">Hola {{Auth::user()->name}}</p>
          <p class="d-block"><b>Función </b>{{Auth::user()->rol->name_role}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::user()->id_rol == 1)
      <nav class="">
        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- users -->
            <li class="nav-item">
                <a class="nav-link" href="/panel">
                    <i class="nav-icon fa-solid fa-house-laptop"></i>
                  <p>
                    Panel Inicio
                  </p>
                </a>
              </li>
        </ul> <!-- End users -->
        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- alumnos -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#alumnos" role="button" aria-expanded="false" aria-controls="alumnos">
                    <i class="nav-icon fa-solid fa-user-group"></i>
                  <p>
                    Alumnos
                  </p>
                  <i class="right fa-solid fa-caret-down"></i>
                </a>
            </li>
        </ul> <!-- End alumnos -->
        <ul class="nav nav-treeview nav-sidebar flex-column collapse ul-users-menu mb-1" id="alumnos"  data-widget="treeview" role="menu" data-accordion="false"> <!-- submenu alumnos -->
            <li class="nav-item">
                <a href="{{ route('inscriptions', 'f=pending') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-sheet-plastic"></i>
                  <p>
                      Preiscripciones
                  </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inscriptions', 'f=done') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-sheet-plastic"></i>
                  <p>
                      Inscripciones
                  </p>
              </a>
            </li>
        </ul> <!-- end submenu alumnos -->

        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- grupos -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Grupos" role="button" aria-expanded="false" aria-controls="Grupos">
                    <i class="nav-icon fa-solid fa-user-group"></i>
                  <p>
                    Grupos
                  </p>
                  <i class="right fa-solid fa-caret-down"></i>
                </a>
            </li>
        </ul> <!-- End grupos -->
        <ul class="nav nav-treeview nav-sidebar flex-column collapse ul-users-menu mb-1" id="Grupos"  data-widget="treeview" role="menu" data-accordion="false"> <!-- submenu grupos -->
            <li class="nav-item"> <!-- Listado de grupos -->
                <a href="{{ route('period.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-calendar-check"></i>
                    <p>
                        Listado
                    </p>
                </a>
            </li><!-- Listado de grupos -->
            <li class="nav-item">
                <a href="{{ route('class_time.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-business-time"></i>
                  <p>
                    Horarios de clases
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('career.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-school"></i>
                  <p>
                    Carreras UTT
                  </p>
                </a>
            </li>
        </ul> <!-- end submenu grupos -->

        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- celut uttn -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#celut_uttn" role="button" aria-expanded="false" aria-controls="celut_uttn">
                    <i class="nav-icon fa-solid fa-building-columns"></i>
                  <p>
                    Idiomas
                  </p>
                  <i class="right fa-solid fa-caret-down"></i>
                </a>
              </li>
        </ul> <!-- End celut uttn -->
        <ul class="nav nav-treeview nav-sidebar flex-column collapse ul-users-menu mb-1" id="celut_uttn"  data-widget="treeview" role="menu" data-accordion="false"> <!-- submenu celut uttn -->
            <li class="nav-item">
              <a href="/level" class="nav-link">
                <i class="nav-icon fa-solid fa-align-justify"></i>
                <p>
                  Niveles de Idioma
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="/language" class="nav-link">
                  <i class="nav-icon fa-solid fa-language"></i>
                  <p>
                    Idiomas
                  </p>
                </a>
              </li>
        </ul> <!-- end submenu celut uttn -->
        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- users -->
            <li class="nav-item" >
                <a class="nav-link" data-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users">
                    <i class="nav-icon fa-solid fa-user"></i>
                  <p>
                    Usuarios
                  </p>
                  <i class="right fa-solid fa-caret-down"></i>
                </a>
            </li>
        </ul> <!-- End users -->
        <ul class="nav nav-treeview nav-sidebar flex-column collapse ul-users-menu mb-1" id="users"  data-widget="treeview" role="menu" data-accordion="false"> <!-- submenu users -->
          <li class="nav-item">
            <a href="/user" class="nav-link">
                <i class="nav-icon fa-solid fa-user-check"></i>
                <p>
                    Listado
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.create')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-user-plus"></i>
              <p>
                Agregar
              </p>
            </a>
          </li>
        </ul> <!-- end submenu users -->
      </nav> <!-- end administrator panel -->
      @endif
      @if (Auth::user()->id_rol == 2)
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- users -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="nav-icon fa-solid fa-house"></i>
                  <p>
                    Página principal
                  </p>
                </a>
              </li>
        </ul> <!-- End users -->
        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- users -->
            <li class="nav-item">
                <a class="nav-link" href="/panel">
                    <i class="nav-icon fa-solid fa-house-laptop"></i>
                  <p>
                    Panel Inicio
                  </p>
                </a>
              </li>
        </ul> <!-- End users -->
        <ul class="nav nav-pills nav-sidebar flex-column" > <!-- groups -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#groups" role="button" aria-expanded="false" aria-controls="groups">
                    <i class="nav-icon fa-solid fa-user-group"></i>
                  <p>
                    Preinscripciones
                  </p>
                  <i class="right fa-solid fa-caret-down"></i>
                </a>
            </li>
        </ul> <!-- End groups -->
        <ul class="nav nav-treeview nav-sidebar flex-column collapse ul-users-menu mb-1" id="groups"  data-widget="treeview" role="menu" data-accordion="false"> <!-- submenu users -->
            @if (!$data->paymentsPending!=0)
                <li class="nav-item">
                    <a href="{{route('preinscription.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Iniciar preinscripción
                    </p>
                    </a>
                </li>
            @endif

              <li class="nav-item">
                <a href="{{route('preinscription.index', 'act=pending')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   Preinscripciones pendientes
                  </p>
                </a>
              </li>
        </ul> <!-- end submenu users -->

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('preinscription.index', 'act=cursing')}}" class="nav-link">
                  <i class="nav-icon fa-solid fa-school-circle-check"></i>
                  <p>
                    Cursando
                  </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('preinscription.index')}}" class="nav-link">
                  <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                  <p>
                    Historial
                  </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>
                Perfil
                </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      @endif
      <!-- /.sidebar-menu -->
      <div class="mt-3 mb-3 d-flex" style="border-bottom: 1px solid #e4dedeb6;border-top: 1px solid #e4dedeb6;">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/log-out" class="nav-link">
                      <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                      <p>
                        Cerrar sesión
                      </p>
                    </a>
                </li>
            </ul>
          </nav>
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
