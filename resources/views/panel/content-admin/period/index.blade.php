@extends('panel.layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
@endsection

@section('content-page')
@if(Session::has('message'))
    <script type="text/javascript">
        toastr["success"]("{{Session::get('message')}}")
    </script>
@endif

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Grupos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Grupos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{route('period.create')}}" class="btn btn-secondary m-1">Agregar nuevo grupo</a>
          </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre del grupo</th>
                      <th scope="col">Fecha de Inicio</th>
                      <th scope="col">Fecha de Finalización</th>
                      <th scope="col">Año</th>
                      <th scope="col">Nivel</th>
                      <th scope="col">Días</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($periods as $period)
                    <tr>
                        <th scope="row">{{$period->id}}</th>
                        <td>{{$period->groupName}}</td>
                        <td>{{$period['start-date']}}</td>
                        <td>{{$period['end-date']}}</td>
                        <td>{{$period->year}}</td>
                        <td>{{$period->level->name_level}}</td>
                        <td>{{$period->class_time->daysPerWeek}}</td>
                        <td>
                            @if ($period->isActive==1)
                                <p class="text-monospace text-success">Activo</p>
                            @else
                                <p class="text-monospace text-danger">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <div class="row justify-content-center">
                                <a href="{{route('period.edit',$period->id)}}" class="btn btn-info p-1">Editar</a>
                                <a href="{{route('period.show',$period->id)}}" class="btn btn-secondary p-1 ml-1">Detalles</a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
            </table>
          </div>

        <!-- /.row -->
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
