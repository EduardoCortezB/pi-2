@extends('layout')

@section('title', 'Registro')
@section('title-description', 'Registro de candidato al Celut')

@section('scripts')
@endsection

@section('content-html')
<section class="breadcrumbs">
    <div class="container">
    <ol>
        <li><a href="/">INICIO</a></li>
        <li>REGISTRO DE ASPIRANTE</li>
    </ol>
    <h2>REGISTRO DE ASPIRANTE</h2>
</div>
</section>

<div id="contRegister"></div>
<section class="inner-page">
    <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-12">
        <form class="g-3 needs-validation php-email-form" id="registerAspirant" novalidate>
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre</label>
              <input type="text" class="form-control" id="validationCustom01" placeholder="Nombre" required>
              <div class="text-danger" style="display: none;" id="valc1">
                Información Invalida
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom02" >Apellidos</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Apellidos" required>
              <div class="text-danger" style="display: none;" id="valc2">
                Información Invalida
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom03">Correo</label>
              <input type="email" class="form-control" id="validationCustom03" placeholder="Correo" required>
              <div id="validationCustom03" class="form-text">Si eres estudiante de la UTTN, porfavor ingresa el correo Institucional.</div>
              <div class="text-danger" style="display: none;" id="valc3">
                Se requiere una dirección de correo electronico valida.
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom05">Numero/Telefono</label>
              <input type="text" class="form-control" id="validationCustom04" placeholder="Numero" min="10" max="10" required>
              <div class="text-danger" style="display: none;" id="valc4">
                Información Invalida, el número debe de ser de 10 caracteres numericos.
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom06">Contraseña</label>
              <input type="text" class="form-control" id="validationCustom05" placeholder="Numero" min="5" max="30" required>
              <div id="validationCustom06" class="form-text">No olvides tu contraseña, será requerida para iniciar sesión en esta plataforma.</div>
              <div class="text-danger" style="display: none;" id="valc5">
                La contraseña no tiene las especificaciones deseadas: Minimo 5 caracteres, máximo 30.
              </div>
            </div>
            <div class="d-grid gap-2 pt-4">
              <button class="btn btn-success" type="button" onclick="stepTwo()">Siguiente</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</section>
@endsection
