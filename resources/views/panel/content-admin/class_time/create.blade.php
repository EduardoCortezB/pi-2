@extends('panel.layout')

@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar horario de clase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar horario de clase</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('class_time.store')}}" class="g-3 needs-validation php-email-form" method="POST" novalidate>
            @csrf
          <div class="row">
            <div class="col-md-2">
              <label for="validationCustom01">Hora de inicio</label>
              <input type="time" class="form-control" name="start-time">
              @error('start-time')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-2">
                <label for="validationCustom01">Hora de Finalización</label>
                <input type="time" class="form-control" name="end-time">

                  @error('end-time')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="validationCustom01">Fecha de inicio</label>
                <input type="date" name="start-date" class="form-control" value="">
                @error('start-date')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="validationCustom01">Fecha de finalización</label>
                <input type="date" name="end-date" class="form-control" value="">
                @error('end-date')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-5 mt-1">
                <h3>Selecciona los días</h3>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="mo" value="1" class="custom-control-input" id="lunes">
                    <label class="custom-control-label" for="lunes">Lunes</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="tu" value="2" class="custom-control-input" id="martes">
                    <label class="custom-control-label" for="martes">Martes</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="we" value="3"  class="custom-control-input" id="miercoles">
                    <label class="custom-control-label"for="miercoles">Miércoles</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="th" value="4" class="custom-control-input" id="jueves">
                    <label class="custom-control-label" for="jueves">Jueves</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="fr" value="5" class="custom-control-input" id="viernes">
                    <label class="custom-control-label" for="viernes">Viernes</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="sa" value="6" class="custom-control-input" id="sabado">
                    <label class="custom-control-label" for="sabado">Sábado</label>
                </div>
                <div class="col-md-12 custom-control custom-checkbox">
                    <input type="checkbox" name="su" value="7" class="custom-control-input" id="domingo">
                    <label class="custom-control-label" for="domingo">Domingo</label>
                </div>
            </div>
            <div class="col-md-12 d-grid gap-2 pt-4">
              <button class="btn btn-primary" type="submit">Crear horario</button>
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
