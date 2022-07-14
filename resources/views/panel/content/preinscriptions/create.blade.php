@extends('panel.layout')

@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Iniciar Preinscripción</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('inscriptions')}}">Preinscripciones</a></li>
              <li class="breadcrumb-item active">Iniciar Preinscripción</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('preinscription.store')}}" method="POST">
            @csrf
            @method('POST')
        <div class="row">
            <div class="col-md-6">
                <label for="uttn_student">Eres estudiante de la UTTN</label>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="isUttStudent" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="uttn_student">
                        No
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="isUttStudent" id="flexRadioDefault2">
                    <label class="form-check-label" for="uttn_student">
                        Si
                    </label>
                </div>

            </div>
            <div class="col-md-6">
                <fieldset id="field" disabled>
                    <label for="form-select-careers">Selecciona la carrera</label>
                    <select class="form-control mt-2" name="career_id" id="form-select-careers" >
                        <option selected hidden disabled>Selecciona la carrera.</option>
                        @foreach ($careers as $career)
                            <option value="{{$career->id}}">{{$career->career_name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                @error('career_id')
                <div class="text-danger" id="isStuding">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
                <label for="levelEng">Selecciona el Idioma que quieres cursar:</label>
                <select class="form-control" name="language_id" id="levelEng">
                    <option selected hidden disabled>Slecciona las opciones</option>
                    @foreach ($languages as $lang)
                        <option value="{{$lang->id}}">{{$lang->language}}</option>
                    @endforeach
                </select>
                @error('language_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
                <label for="levelEng">Selecciona el nivel de lenguaje:</label>
                <select class="form-control" name="level_id" id="levelEng">
                    <option selected hidden disabled>Slecciona las opciones</option>
                    @foreach ($levels as $level)
                        <option value="{{$level->id}}">{{$level->name_level}}</option>
                    @endforeach
                </select>
                @error('level_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                <label for="levelEng">Selecciona el horario:</label>
                <select class="form-control" name="class_time_id" id="levelEng">
                    <option selected hidden disabled>Slecciona las opciones</option>
                    @foreach ($class_times as $class_time)
                        <option value="{{$class_time->id}}">{{$class_time->start_time}} Horas a {{$class_time->end_time}} Horas los días {{ $class_time->daysPerWeek }}</option>
                    @endforeach
                </select>
                @error('class_time_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-grid gap-2 pt-4">
            <button class="btn btn-primary" type="submit">Realizar preinscripción</button>
            </div>
        </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Agregar Preinscripción</h5>
      <p>Al momento de agregar preinscripción se genera una preinscripción al alumno correspondiente, de esta manera se le dara seguimiento.
      </p>
      <p>El alumno deberá de seguir este seguimiento ya que debe de subir su comprobante de pago para que sea validado por el administrador y posteriormente se le asigne un grupo de clases.</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <script>
    const field = document.getElementById('field');
    const checkOne = document.getElementById('flexRadioDefault1');
    const checkTwo = document.getElementById('flexRadioDefault2');

    document.addEventListener('DOMContentLoaded',()=>{
        if (checkTwo.checked) {
            field.disabled=false;
            return
        }
        field.disabled=true;

        if (document.getElementById('isStuding')) {
            field.disabled=false;
            checkTwo.checked=true
            checkOne.checked=false
        }
    })
    checkOne.addEventListener('change',(e)=>{
        field.disabled=true;
        document.getElementById('form-select-careers').children[0].selected=true;
    })

    checkTwo.addEventListener('change',(e)=>{
        field.disabled=false;
    })

  </script>
@endsection
