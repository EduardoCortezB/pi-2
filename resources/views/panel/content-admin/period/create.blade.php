@extends('panel.layout')

@section('content-page')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Periodo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/panel">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('period.index')}}">Periodos</a></li>
              <li class="breadcrumb-item active">Agregar Periodo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('period.store')}}" class="g-3 needs-validation php-email-form" method="POST">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre del periodo</label>
              <input type="text" name="groupName" value="{{old('groupName')}}" class="form-control @error('groupName') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('groupName')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label for="year">Año</label>
                <input type="text" name="year" id="year" value="" class="form-control" disabled>
                @error('year')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="validationCustom01">Fecha de inicio del periodo</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="start_month">Mes:</label>
                                <select id="start_month" class="form-control" name="start_month">
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
                                @error('start_month')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                            <div class="col-6">
                              <label for="start_day">Día:</label>
                              <select id="start_day" class="form-control" name="start_day">

                              </select>
                              @error('start_day')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <label for="validationCustom01">Fecha de finalización del periodo</label>
                        <div class="row">
                            <div class="col-6">
                                <label for="end_month">Mes:</label>
                                <select id="end_month" class="form-control" name="end_month">
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
                                @error('end_month')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                            <div class="col-6">
                              <label for="end_day">Día:</label>
                              <select id="end_day" class="form-control" name="end_day">

                              </select>
                              @error('end_day')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 row">
                <div class="col-md-6">
                    <label for="id_level">Selecciona el nivel del lenguaje</label>
                    <select id="id_level" class="form-control" name="id_level">
                        <option selected hidden disabled>Seleccionar</option>
                        @foreach ($levelsLang as $level)
                        <option value="{{$level->id}}">{{$level->name_level}}</option>
                        @endforeach
                    </select>
                    @error('id_level')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_language">Selecciona el lenguaje del grupo</label>
                    <select id="id_language" class="form-control" name="id_language">
                        <option selected hidden disabled>Seleccionar</option>
                        @foreach ($languages as $lang)
                        <option value="{{$lang->id}}">{{$lang->language}}</option>
                        @endforeach
                    </select>
                    @error('id_language')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="id_class_time">Selecciona el horario para el periodo</label>
                <select id="id_class_time" class="form-control" name="id_class_time">
                    <option selected hidden disabled>Seleccionar</option>
                    @foreach ($class_times as $class)
                        <option value="{{$class->id}}">
                            <table>
                                <tbody>
                                    <tr>
                                        <th scope="col">{{ $class->start_time }} Horas a </th>
                                        <th scope="col">{{ $class->end_time }} Horas de </th>
                                        <th scope="col">{{ $class->daysPerWeek }}</th>
                                      </tr>
                                </tbody>
                            </table>
                        </option>
                    @endforeach
                </select>
                @error('id_class_time')
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">

      <h5><i class="fa-solid fa-triangle-exclamation" style="color: rgb(255, 230, 0)"></i>Importante</h5>
      <p>Todos los elementos como: Nivel, Idioma y Horario serán ocultados si no estan habilitados/activos, si requiere esa información habilitelos o cree uno nuevo.
        Tenga en cuenta que esa información se vera reflejada en el formulario de creación de preinscripciones en el sistema de alumno.
      </p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', ()=>{
        const start_month = document.getElementById('start_month');
        const start_day = document.getElementById('start_day');
        populateDaysStart(start_month.value)
        start_month.onchange=function(){
            populateDaysStart(start_month.value)
        }

        const end_month = document.getElementById('end_month');
        const end_day = document.getElementById('end_day');
        populateDaysEnd(end_month.value)
        end_month.onchange=function(){
            populateDaysEnd(end_month.value)
        }

        const year = document.getElementById('year');
        const yD = new Date();
        y=yD.getFullYear();
        year.value=y;

    })

    function populateDaysStart(month) {
        // borra la actual muestra de elementos <option> que quedan fuera
        // del <select> para el día, listo para que los siguentes días sean inyectados

        // Crea una variable que guarda el nuevo número de días a ser inyectados.
        var dayNum;
        // ¿Son 31 o 30 días?
        if (
            (month === "Enero") |
            (month === "Marzo") |
            (month === "Mayo") |
            (month === "Julio") |
            (month === "Agosto") |
            (month === "Octubre") |
            (month === "Diciembre")
        ) {
            dayNum = 31;
        } else if (
            (month === "Abril") |
            (month === "Juno") |
            (month === "Septiembre") |
            (month === "Noviembre")
        ) {
            dayNum = 30;
        } else {
            // Si el mes es febrero, calcula si el año es bisiesto o no.
            var year = new Date();
            year=year.getFullYear();
            var isLeap = new Date(year, 1, 29).getMonth() == 1;
            isLeap ? (dayNum = 29) : (dayNum = 28);
        }

        // Inyecta el número adecuado de nuevos elementos <option> dentro del <select> para los días
            start_day.innerHTML=''
            let opt=document.createElement("option")
            opt.setAttribute("selected", "true");
            opt.setAttribute("hidden", "true");
            opt.setAttribute("disabled", "true");
            opt.textContent='Seleccionar'
            start_day.appendChild(opt)

            for (i = 1; i <= dayNum; i++) {
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                start_day.appendChild(option);
        }
    }

    function populateDaysEnd(month) {
        // borra la actual muestra de elementos <option> que quedan fuera
        // del <select> para el día, listo para que los siguentes días sean inyectados

        // Crea una variable que guarda el nuevo número de días a ser inyectados.
        var dayNum;
        // ¿Son 31 o 30 días?
        if (
            (month === "Enero") |
            (month === "Marzo") |
            (month === "Mayo") |
            (month === "Julio") |
            (month === "Agosto") |
            (month === "Octubre") |
            (month === "Diciembre")
        ) {
            dayNum = 31;
        } else if (
            (month === "Abril") |
            (month === "Juno") |
            (month === "Septiembre") |
            (month === "Noviembre")
        ) {
            dayNum = 30;
        } else {
            // Si el mes es febrero, calcula si el año es bisiesto o no.
            var year = new Date();
            year=year.getFullYear();
            var isLeap = new Date(year, 1, 29).getMonth() == 1;
            isLeap ? (dayNum = 29) : (dayNum = 28);
        }

        // Inyecta el número adecuado de nuevos elementos <option> dentro del <select> para los días
            end_day.innerHTML=''
            let opt=document.createElement("option")
            opt.setAttribute("selected", "true");
            opt.setAttribute("hidden", "true");
            opt.setAttribute("disabled", "true");
            opt.textContent='Seleccionar'
            end_day.appendChild(opt)
            for (i = 1; i <= dayNum; i++) {
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                end_day.appendChild(option);
        }
    }
  </script>
@endsection
