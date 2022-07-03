@extends('panel.layout')

@section('content-page')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar Usuario</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('user.store')}}" class="g-3 needs-validation php-email-form" method="POST" novalidate>
            @csrf
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre</label>
              <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Apellidos</label>
              <input type="text" value="{{old('lastName')}}" name="lastName" class="form-control @error('lastName') border-danger @enderror" id="validationCustom02" placeholder="Apellidos" required>
              @error('lastName')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="validationCustom03">Correo</label>
              <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') border-danger @enderror" id="validationCustom03" placeholder="Correo" required>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom05">Numero/Telefono</label>
              <input type="text" value="{{old('phoneNumber')}}" name="phoneNumber" class="form-control @error('phoneNumber') border-danger @enderror" id="validationCustom04" placeholder="Numero" min="10" max="10" required>
              @error('phoneNumber')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label for="password">Contraseña</label>
                <input type="password" value="{{old('password')}}" class="form-control @error('password') border-danger @enderror" name="password" id="password" placeholder="Contraseña" min="5" max="30" required>
                @error('password')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                  <label for="password_confirmation">Repite la contraseña</label>
                  <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" id="password_confirmation" placeholder="Repite tu cotraseña" min="5" max="30" required>
                  @error('password_confirmation')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            <div class="col-md-12">
              <label for="rol">Rol</label>
                <select class="custom-select" name="id_rol">
                    @foreach ($roles as $rol)
                        @if ($rol->id==2)
                            <option selected value="{{$rol->id}}">{{$rol->name_role}}</option>
                        @else
                            <option value="{{$rol->id}}">{{$rol->name_role}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 pt-4">
              <button class="btn btn-primary" type="submit">Agregar</button>
            </div>
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

@endsection
