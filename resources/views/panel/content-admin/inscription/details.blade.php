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
            <h1 class="m-0">Detalles de @if ($payment->id_candidat!=null && $payment->id_valid == 1)
                Inscripción.
            @else
                Preinscripción.
            @endif</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/inscriptions">Listado</a></li>
              <li class="breadcrumb-item active">@if ($payment->id_candidat!=null && $payment->id_valid == 1)Inscripción @else Preinscripción @endif</li>
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
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="m-0">Información acerca del aspirante</h5>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>ID </b>{{$inscription->user->id}}</li>
                                <li class="list-group-item"><b>Nombres </b>{{$inscription->user->name}}</li>
                                <li class="list-group-item"><b>Apellidos </b>{{$inscription->user->lastName}}</li>
                                <li class="list-group-item"><b>Numero </b>{{$inscription->user->phoneNumber}}</li>
                                <li class="list-group-item"><b>Email </b>{{Str::lower($inscription->user->email)}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Nivel </b>{{$inscription->level->name_level}}</li>
                                <li class="list-group-item"><b>Idioma que quiere cursar el alumno </b>
                                    @if ($inscription->language_id!= null)
                                        {{$inscription->language->language}}
                                    @else
                                        <p class="text-monospace text-danger">El idioma esta desactivado ID {{$inscription->language_id}}</p>
                                    @endif
                                </li>
                                <li class="list-group-item"><b>Carrera en la que estudia </b>
                                    @if ($inscription->career_id != null)
                                        {{$inscription->career->career_name}}
                                    @else
                                        <p class="text-monospace text-danger m-0">No es alumno de la UTTN</p>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="m-0">Grupo Asignado</h5>
                    </div>
                    <div class="card-body row">
                        @if ($inscription->id_period!=null&&$payment->id_candidat!=null && $payment->is_valid == 1)
                            <ul class="list-group">
                                <li class="list-group-item"><b>Grupo Asignado</b> {{$inscription->period->groupName}}</li>
                            </ul>
                            <form action="{{url("inscription/assign/$inscription->id")}}" method="post">
                                @csrf
                                @method('put')
                                <label>Cambiar grupo</label>
                                <select name="id_period" id="updated_ct" class="custom-select">
                                    @foreach ($periods as $period)
                                        @if ($period->isActive!=0)
                                            <option value="{{$period->id}}">{{$period->groupName}} - {{$period->year}} - {{$period->level->name_level}} - {{$period->language->language}}
                                            - {{$period['start-date']}} to {{$period['end-date']}} at {{$period->class_time->start_time}} Horas to {{$period->class_time->end_time}} Horas
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary btn-block mt-1">Asignar</button>
                            </form>
                        @else
                            @if ($inscription->id_period==null&&$payment->id_candidat!=null&&$payment->is_valid == 1)
                                <p class="text-monospace text-info">Se ha validado el pago, realizar seguimiento para el grupo.</p><hr>
                                <form action="{{url("inscription/assign/$inscription->id")}}" method="post">
                                    @csrf
                                    @method('put')
                                    <label>Asignar grupo</label>
                                    <select name="id_period" id="updated_ct" class="custom-select">
                                        @foreach ($periods as $period)
                                            @if ($period->isActive!=0)
                                                <option value="{{$period->id}}">{{$period->groupName}} - {{$period->year}} - {{$period->level->name_level}} - {{$period->language->language}}
                                                - {{$period['start-date']}} to {{$period['end-date']}} at {{$period->class_time->start_time}} Horas to {{$period->class_time->end_time}} Horas
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-block mt-1">Asignar</button>
                                </form>
                            @else
                                <div class="d-flex justify-content-center">
                                    <p class="text-monospace text-danger">No se ha dado seguimiento al pago.</p>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="m-0">Información del pago</h5>
                    </div>
                    <div class="card-body row">
                        {{-- <iframe src="http://docs.google.com/gview?url=http://www.educoas.org/portal/bdigital/contenido/valzacchi/ValzacchiCapitulo-2New.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0" ></iframe> --}}
                        @if ($payment->id_candidat!=null && $payment->is_valid == 1)
                            <ul class="list-group">
                                <li class="list-group-item text-monospace text-success">Inscripción pagada</li>
                                <li class="list-group-item"><b>Fecha de subida </b>{{$payment->created_at}}</li>
                            </ul>
                            <div class="m-1">
                                <button type="click" id="btnPdf" class="btn btn-info">Ver Pdf</button>
                            </div>

                        @elseif ($payment->id_candidat!=null&& $payment->is_valid == 0)
                            <p class="text-monospace text-info">Se ha subido el documento </p><hr>

                            <form action="{{route('inscription.validate',$payment->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Validar</button>
                            </form>
                            <button type="click" id="btnPdf" class="btn btn-info">Ver Pdf</button>
                        @else
                            <div class="d-flex justify-content-center">
                                <p class="text-monospace text-danger">No le ha dado seguimiento al pago el alumno.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none;" id="viewPdf">
                <embed src="{{url("pdf/payments/$filePdfName")}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
            </div>
        </div>

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

  <script>
    document.addEventListener('DOMContentLoaded',()=>{
        const btnViewPdf = document.getElementById('btnPdf');
        const viewPdf = document.getElementById('viewPdf');
        btnViewPdf.addEventListener('click',()=>{
            viewPdf.style='display: show;'
        })

    })
  </script>
@endsection
