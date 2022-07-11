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
            <h1 class="m-0">Preinscripciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Preinscripciones</li>
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
            <a href="{{route('add_inscription')}}" class="btn btn-secondary m-1">Agregar nueva preinscripción</a>
          </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Estudiante</th>
                      <th scope="col">Nivel</th>
                      <th scope="col">Horario</th>
                      <th scope="col">Estudiante de UTTN</th>
                      <th scope="col">Idioma</th>
                      <th scope="col">Grupo</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($inscriptions as $inscription)
                    <tr>
                        <th scope="row">{{$inscription->id}}</th>
                        <td>{{$inscription->user->name}} {{$inscription->user->lastName}}</td>
                        <td>{{$inscription->level->name_level}}</td>
                        <td>
                            @if ($inscription->class_time->isActive==1)
                                    {{$inscription->class_time->start_time}} Horas a {{$inscription->class_time->end_time}} de {{$inscription->class_time->daysPerWeek}}
                                @else
                                    <p class="text-monospace text-danger">El horario esta desactivado ID {{$inscription->class_time->id}}</p>
                            @endif
                        </td>
                        <td>
                            @if ($inscription->career_id != null)
                                {{$inscription->career->career_name}}
                            @else
                                <p class="text-monospace text-danger">No es alumno de la UTTN</p>
                            @endif
                        </td>
                        <td>
                            @if ($inscription->language_id!= null)
                                {{$inscription->language->language}}
                            @else
                                <p class="text-monospace text-danger">El idioma esta desactivado ID {{$inscription->language_id}}</p>
                            @endif
                        </td>
                        <td>
                            @if ($inscription->id_period!=null)
                                {{$inscription->period->groupName}}
                            @else
                                <p class="text-monospace text-danger">Sin grupo asignado</p>
                            @endif
                        </td>
                        <td>
                            <a href="inscriptions/details/{{$inscription->id}}" class="btn btn-info">Ver detalles</a>
                            {{-- <form action="{{route('level.destroy', $inscription->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form> --}}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="pagination justify-content-end">
                {{-- {!! $levels->links() !!} --}}
            </div>
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
