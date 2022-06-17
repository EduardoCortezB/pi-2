@extends('layout')

@section('title', 'Registro')
@section('title-description', 'Registro de candidato al Celut')

@section('scripts')
<script src="{{asset('js/app/form-reg.js')}}"></script>
@endsection

@section('content-html')
<template id="breadCrumbs">
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="/">INICIO</a></li>
        <li></li>
      </ol>
      <h2></h2>
    </div>
  </section>
</template>
<div id="contRegister"></div>
<div class="container"> 
    <div class="row justify-content-center" id="register_aspirant_celut_step1" style="display:none;">
      <div class="col-6 p-4">
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
              <button class="btn btn-primary" type="button" onclick="stepTwo()">Siguiente</button>
            </div>
          </div>
      </div>
  </div>

  <div class="row justify-content-center" id="register_aspirant_celut_step2" style="display:none;">
    <div class="col-6 p-4">
        <div class="row">
          <div class="col-md-6">
            <label for="validationCustom01">Eres estudiante de la UTT</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                No
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Si
              </label>
            </div>
            <div class="valid-feedback">
              Información validada
            </div>
          </div>

          <div class="col-md-6">
            <select class="form-select" id="form-select-careers" style="display: none;">
              <option selected>Selecciona la carrera.</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Selecciona el Idioma que quieres cursar:</label>
            <select class="form-select" id="levelEng">
              <option selected hidden disabled>Slecciona las opciones</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Nivel</label>
            <select class="form-select" id="levelEng">
              <option selected>Selecciona la carrera.</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <div id="validationCustom03" class="form-text">Si no sabes tu nivel de Inglés, realiza un examen en la siguiente url <a href="">nnjds</a>.</div>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Selecciona un horario:</label>
            <select class="form-select" id="levelEng">
              <option selected hidden disabled>Slecciona las opciones</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="d-grid gap-2 pt-4">
            <button class="btn btn-primary" type="submit">Inscribirse</button>
          </div>
        </div>
      </form>
    </div>
</div>
</div>
@endsection