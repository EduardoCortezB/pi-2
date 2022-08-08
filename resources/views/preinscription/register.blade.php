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
<section class="inner-page">
    <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-12">
        <form class="g-3 needs-validation php-email-form"  method="post" novalidate>
            @csrf
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre</label>
              <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom02">Apellidos</label>
              <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control @error('apellidos') border-danger @enderror" id="validationCustom02" placeholder="Apellidos" required>
              @error('apellidos')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="validationCustom03">Correo</label>
              <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') border-danger @enderror" id="validationCustom03" placeholder="Correo" required>
              <div id="validationCustom03" class="form-text">Si eres estudiante de la UTTN, porfavor ingresa el correo Institucional.</div>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="validationCustom05">Numero/Telefono</label>
              <input type="text" value="{{old('numero')}}" name="numero" class="form-control @error('numero') border-danger @enderror" id="validationCustom04" placeholder="Numero" min="10" max="10" required>
              @error('numero')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="password">Contraseña</label>
              <input type="password" value="{{old('password')}}" class="form-control @error('password') border-danger @enderror" name="password" id="password" placeholder="Contraseña" min="5" max="30" required>
              <div id="validationCustom06" class="form-text">No olvides tu contraseña, será requerida para iniciar sesión en esta plataforma.</div>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label for="password_confirmation">Repite tu contraseña</label>
                <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" id="password_confirmation" placeholder="Repite tu cotraseña" min="5" max="30" required>
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              </div>
            <div class="d-grid gap-2 pt-4">
              <button class="btn btn-success" style="background-color; #0000CC; color: white;" type="submit">Siguiente</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</section>
@endsection
