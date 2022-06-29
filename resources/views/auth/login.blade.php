@extends('layout')

@section('title', 'Iniciar Sesión')
@section('title-description', 'Inicio de sesión de celut.')

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
  "positionClass": "toast-bottom-full-width",
  "preventDuplicates": false,
  "onclick": null,
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

@section('content-html')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">INICIO</a></li>
            <li>INICIAR SESIÓN</li>
        </ol>
        <h2>INICIAR SESIÓN</h2>

    </div>
</section><!-- End Breadcrumbs -->

{{-- ALERT --}}
<!--A-->
@if(Session::has('message'))
    <script type="text/javascript">
        toastr["success"]("{{Session::get(['data'])}}")
    </script>
@endif
@if(Session::has('message-error'))
    <script type="text/javascript">
        toastr["error"]("{{Session::get('message-error')}}")
    </script>
@endif
<section class="inner-page">
<div class="container" data-aos="fade-up">
  <div class="row justify-content-center">
    <div class="col-8">
      <form class="g-3" method="post" novalidate autocomplete="off">
        @csrf
        <div class="row p-4" style="border-radius: 9px">
          <div class="col-md-12">
            <label for="email">Correo</label>
            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') border-danger @enderror" placeholder="Escribe tu email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="password" >Contraseña</label>
            <input type="password" name="password" id="password" class="form-control @error('email') border-danger @enderror" placeholder="Escribe tu password" value="{{old('password')}}" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="d-grid gap-2 pt-4">
            <button class="btn" style="background: #009879; color:rgb(255, 255, 255)" type="submit">Acceder</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
@endsection
