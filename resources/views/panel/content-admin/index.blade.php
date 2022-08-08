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
            <h1 class="m-0">Métricas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Métricas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$data->data['metrics']['preinscriptions']}}</h3>
                    <p>Preinscripciones<br>pendientes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-document"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                  <h3>{{$data->data['metrics']['languages']}}</h3>

                  <p>Niveles de <br>idioma activos</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-language"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$data->data['metrics']['studentsCoursing']}}</h3>

                  <p>Alumnos <br>Cursando</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$data->data['metrics']['periodsActivesIsCurrentY']}}</h3>

                  <p>Periodos activos <br>del año actual</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-do-not-enter"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Solicitar reporte
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <form action="{{route('metrics.requestReport')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="startMonth">Mes inicio</label>
                                <select class="form-control" name="startMont" id="startMonth">
                                    <option selected hidden disabled>Seleccionar</option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Octubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="endMont">Mes finalización</label>
                                <select class="form-control" name="endMont" id="endMont">
                                    <option selected hidden disabled>Seleccionar</option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Octubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Año</label>
                                <select class="form-control" name="year" id="year">
                                    <option selected hidden disabled>Seleccionar</option>
                                    @for ($y=$years->minY; $y <= $years->maxY;$y++)
                                        <option>{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block p-1" style="background-color: #0000CC; color:azure;">
                            Solicitar reporte
                        </button>
                    </div>
                </form>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


