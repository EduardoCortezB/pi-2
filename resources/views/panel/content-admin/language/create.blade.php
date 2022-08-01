@extends('panel.layout')

@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Idioma</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('language.index')}}">Idiomas</a></li>
              <li class="breadcrumb-item active">Agregar Idioma</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('language.store')}}" class="g-3 needs-validation php-email-form" method="POST" novalidate>
            @csrf
          <div class="row">
            <div class="col-md-5">
              <label for="validationCustom01">Nombre del idioma</label>
              <input type="text" name="language" value="{{old('name')}}" class="form-control @error('name') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('language')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12 d-grid gap-2 pt-4">
              <button class="btn btn-primary" type="submit">Agregar</button>
            </div>
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
