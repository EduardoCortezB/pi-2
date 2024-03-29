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
                                <li class="list-group-item"><b>ID </b>{{$user->id}}</li>
                                <li class="list-group-item"><b>Nombres </b>{{$user->name}}</li>
                                <li class="list-group-item"><b>Apellidos </b>{{$user->lastName}}</li>
                                <li class="list-group-item"><b>Numero </b>{{$user->phoneNumber}}</li>
                                <li class="list-group-item"><b>Email </b>{{Str::lower($user->email)}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><b>ID Inscripción </b>{{$inscription->id}}</li>
                                <li class="list-group-item"><b>Nivel </b>{{$inscription->level->name_level}}</li>
                                <li class="list-group-item"><b>Idioma que quiere cursar el alumno </b>
                                    {{$inscription->language->language}}
                                </li>
                                <li class="list-group-item"><b>Carrera en la que estudia</b>
                                    @if ($inscription->career_id != null)
                                        {{$inscription->career->career_name}}
                                    @else
                                        <p class="text-monospace text-danger m-0">No es alumno de la UTTN</p>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    Horario que elegiste
                                    {{$inscription->class_time->start_time}} Horas a {{$inscription->class_time->end_time}} los dias {{$inscription->class_time->daysPerWeek}}
                                </li>
                                <li class="list-group-item">
                                    Cuota de preinscripción
                                    @if ($inscription->career_id != null)
                                        <p class="text-monospace m-0">$1,800</p>
                                    @else
                                        <p class="text-monospace m-0">$2,400</p>
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
                    <div class="card-body">
                        @if ($inscription->id_period!=null&&$payment->id_candidat!=null)
                        <ul class="list-group">
                            <li class="list-group-item"><b>Grupo </b>{{$inscription->period->groupName}}</li>
                            <li class="list-group-item"><b>Idioma </b>{{$inscription->language->language}}</li>
                            <li class="list-group-item"><b>Fecha de inicio </b>{{$inscription->period['start-date']}}</li>
                            <li class="list-group-item"><b>Fecha de finalización </b>{{$inscription->period['end-date']}}</li>
                            <li class="list-group-item"><b>Año de curso </b>{{$inscription->period['year']}}</li>
                            <li class="list-group-item"><b>Año de curso </b>{{$inscription->period->level->name_level}}</li>
                            <li class="list-group-item"><b>Horario </b>{{$inscription->period->class_time->start_time}} Horas a {{$inscription->period->class_time->end_time}}</li>
                            <li class="list-group-item"><b>Dias de la semana </b>{{$inscription->period->class_time->daysPerWeek}}</li>
                        </ul>
                        @elseif ($payment->id_candidat!=null)
                            <p class="text-monospace text-danger m-0">Aún no se le ha asignado un grupo.</p>
                        @else
                            <p class="text-monospace text-danger m-0">Aún no se ha realizado seguimiento al pago.</p>
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
                        @if ($payment->id_candidat==null)
                            <form action="{{route('upload.pdf',$inscription->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="inputFile">Subir comprobante de pago</label>
                                    <input type="file" class="form-control-file" id="inputFile" name="pdfFile">
                                    @error('pdfFile')
                                        <div class="text-danger" id="isStuding">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary p-1">Subir</button>
                            </form>
                        @elseif ($payment->id_candidat!=null)
                        <div class="col-md-12">
                            <embed src="{{url("pdf/payment/$payment->path")}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"/ style="width:100%; height:700px;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@if ($payment->id_candidat==null && $payment->id_candidat==null)
<div class="modal fade" id="alert_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
          </svg> Subir comprobante de pago</h5>
        </div>
        <div class="modal-body">
            <p>
                Hola {{$user->name}}, debido a que no haz subido el comprobante de pago no se te ha asignado un grupo. <br>
                Ya que hayas subido el comprobante de pago el coordinador de CELUT te validará y te asignará un grupo.<br>
                <b>¿No sabes cómo hacer el pago? </b> Sigue las siguientes inscrucciones dando <a href="/pdf/instruction/doPaymentCelut.pdf" target="_blank" rel="noopener noreferrer">click aquí</a>, si tienes problemas, puedes ponerte en contacto con el coordinador
                utilizando la siguiente información <a href="/#contact" target="_blank" rel="noopener noreferrer">Click aquí</a>
            </p>
            <div>
                <h3 style="font-size: 20px">Cuota de preinscripción</h3>
                @if ($inscription->career_id != null)
                    <p class="text-monospace m-0">$1,800</p>
                @else
                    <p class="text-monospace m-0">$2,400</p>
                @endif
            </div>
            <div>
                <p>El coordinador del CELUT se pondra en contacto contigo con la información que proporcionaste.</p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Entendido</button>
        </div>
      </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded',()=>{
        $('#alert_payment').modal('show')
    })
</script>
@endif

  <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5><b>Detalles de @if ($payment->id_candidat!=null && $payment->id_valid == 1)
            Inscripción.
        @else
            Preinscripción.
        @endif</b></h5>
          <p></p>
        </div>
      </aside>
      <!-- /.control-sidebar -->
@endsection
