@extends('panel.layout')

@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Nivel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar Nivel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('level.update',$level->id)}}" class="g-3 needs-validation php-email-form" method="POST" novalidate>
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre del nivel</label>
              <input type="text" name="name_level" value="{{$level->name_level}}" class="form-control @error('name') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('name_level')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <h3>Estado del nivel</h3>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio1" value="1"
                    {{ ($level->isActive==1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineRadio1">Activo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isActive" id="inlineRadio2" value="0"
                    {{ ($level->isActive==0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                </div>
            </div>
            <div class="col-md-12 d-grid gap-2 pt-4">
              <button class="btn btn-primary" type="submit">Editar</button>
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
