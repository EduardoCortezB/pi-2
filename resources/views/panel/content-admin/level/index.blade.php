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
            <h1 class="m-0">Niveles de idioma</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item active">Niveles de idioma</li>
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
            <a href="{{route('level.create')}}" class="btn btn-secondary m-1">Agregar nuevo nivel</a>
          </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre del rol</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($levels as $level)
                    <tr>
                        <th scope="row">{{$level->id}}</th>
                        <td>{{$level->name_level}}</td>
                        <td>
                            <a href="{{route('level.edit',$level->id)}}" class="btn btn-info">Editar</a>
                            <form action="{{route('level.destroy', $level->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $levels->links() !!}
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
