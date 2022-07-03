@extends('panel.layout')


@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Editar Usuario</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('user.update',$user->id)}}" class="g-3 needs-validation php-email-form" method="POST" novalidate>
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Apellidos</label>
              <input type="text" value="{{$user->lastName}}" name="lastName" class="form-control @error('apellidos') border-danger @enderror" id="validationCustom02" placeholder="Apellidos" required>
              @error('lastName')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="validationCustom03">Correo</label>
              <input type="email" value="{{$user->email}}" name="email" class="form-control @error('email') border-danger @enderror" id="validationCustom03" placeholder="Correo" required>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom05">Numero/Telefono</label>
              <input type="text" value="{{$user->phoneNumber}}" name="phoneNumber" class="form-control @error('numero') border-danger @enderror" id="validationCustom04" placeholder="Numero" min="10" max="10" required>
              @error('numero')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="rol">Rol</label>
                <select class="custom-select" name="id_rol">
                    @foreach ($roles as $rol)
                        @if ($user->id_rol==$rol->id)
                            <option selected value="{{$rol->id}}">{{$rol->name_role}}</option>
                        @else
                            <option value="{{$rol->id}}">{{$rol->name_role}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 pt-4">
              <button class="btn btn-success" type="submit">Editar</button>
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


