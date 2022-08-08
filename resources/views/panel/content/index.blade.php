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
            <h1 class="m-0">Inicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Inicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa-solid fa-school-circle-check"></i></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Cursando</span>
                      <span class="info-box-number">{{$data->qtyCoursing->qty}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa-solid fa-school-circle-xmark"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Preinscripciones pendientes</span>
                      <span class="info-box-number">{{$data->qtyNoCoursing->qty}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
            </div>
        </div>


        @if (!$data->callouts)
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                  </svg>
                   Panel Inicio
                </h3>
            </div>
            <div class="card-body">

                @if ($data->preAndInscr->qty!=0 )
                    <div class="callout callout-success m-1">
                        <p>Todo se encuentra en orden <i class="em em-smiley" aria-role="presentation" aria-label="SMILING FACE WITH OPEN MOUTH"></i><br> Disfruta de tus clases.</p>
                    </div>
                @endif
            </div>
        </div>
        @endif
        @if ($data->callouts)
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bullhorn"></i> Avisos del sistema</h3>
            </div>
            <div class="card-body">
                @if ($data->paymentsPending!=0)
                <div class="callout callout-danger m-1">
                    <h5>Pagos</h5>

                    <p>
                        Favor de realizar seguimiento a los pagos pendientes.<br>Tienes deshabilitado realizar alguna otra preinscripción hasta que te mantengas al corriente.<br>
                        Para verlas dale click a <b>Preinscripciones > Preinscripciones pendientes
                    </b>
                    </p>
                </div>
                @endif
                @if ($data->preAndInscr->qty==0)
                <div class="callout callout-info m-1">
                    <h5>Hola, Bienvenido/a {{Auth::user()->name}}</h5>
                    <p>Puedes comenzar creando una preinscripción en <b>Preinscripciones > Iniciar preinscripción</b>.<br>
                    Ya que hayas creado una preinscipción deberas realizar el pago y subir el documento en esta plataforma ingresando a la preinscripción pendiente y después en subir comprobante.<br>
                    Tu pago será validado y se te asignará un grupo. Dirección de CELUT se pondra en contacto contigo con la información con la que te hayas registrado en el portal..
                </p>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Bienvenido</h5>
      <p>En está pagina principal se mostraran diversos avisos del sistema.</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

@endsection
