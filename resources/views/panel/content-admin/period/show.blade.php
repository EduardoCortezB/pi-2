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
            <h1 class="m-0">Listado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Listado</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="table-responsive">
            <h3 class="display-3" style="font-size:30px !important">Información de grupo</h3>
            <table class="table" nonDatatable>
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
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
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
                      </tr>
                  </tbody>
            </table>

            <div>
                <h3 class="display-3" style="font-size:30px !important">Listado de Alumnos</h3>
                <table class="table" nonDatatable>
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellidos</th>
                          <th scope="col">Numero</th>
                          <th scope="col">Email</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @for ($i=0;$i<=$students->count();$i++)
                            <?php
                            try {?>
                                @if ($students[$i]->id!='')
                                    <tr>
                                        <th scope="row">{{$students[$i]->user->id}}</th>
                                        <td>{{$students[$i]->user->name}}</td>
                                        <td>{{$students[$i]->user->lastName}}</td>
                                        <td>{{$students[$i]->user->phoneNumber}}</td>
                                        <td>{{$students[$i]->user->email}}</td>
                                        <td>
                                            <a href="/inscriptions/details/{{$students[$i]->id}}" class="btn btn-info p-1">Detalles</a>
                                        </td>
                                    </tr>
                                @endif
                            <?php }catch(\Throwable $th){}?>
                        @endfor
                    </tbody>
                    </table>
            </div>
          </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->

@endsection
