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
        <form action="{{route('period.update', $period->id)}}" class="g-3 needs-validation php-email-form" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <label for="validationCustom01">Nombre del grupo</label>
              <input type="text" name="groupName" value="{{$period->groupName}}" class="form-control @error('groupName') border-danger @enderror" id="validationCustom01" placeholder="Nombre" required>
              @error('groupName')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
                <label for="year">Año</label>
                <input type="hidden" id="yearDate" value="{{$period->year}}">
                <select name="year" class="form-control" id="year">

                </select>
                @error('year')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="validationCustom01">Fecha de inicio del curso</label>
                        <div class="row">
                        <div class="col-6">
                            <label for="start_month">Mes:</label>
                            <input type="hidden" id="monthStartHidden" value="{{$periodDate['date-start'][1]}}">
                            <select id="start_month" class="form-control" name="start_month">
                                @for ($i = 0; $i < 11; $i++)
                                    @if ($months[$i]==$periodDate['date-start'][1])
                                        <option selected>{{$months[$i]}}</option>
                                    @else
                                        <option>{{$months[$i]}}</option>
                                    @endif
                                @endfor
                              </select>
                              @error('start_month')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-6">
                                <label for="start_day">Día:</label>
                                <input type="hidden" id="dayStartHidden" value="{{$periodDate['date-start'][0]}}">
                                <select id="start_day" class="form-control" name="start_day">

                                </select>
                                @error('start_day')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <label for="validationCustom01">Fecha de finalización del curso</label>
                        <div class="row">
                            <div class="col-6">
                            <label for="end_month">Mes:</label>
                            <input type="hidden" id="monthEndHidden" value="{{$periodDate['date-end'][1]}}">
                              <select id="end_month" class="form-control" name="end_month">
                                @for ($i = 0; $i < 11; $i++)
                                    @if ($months[$i]==$periodDate['date-end'][1])
                                        <option selected>{{$months[$i]}}</option>
                                    @else
                                        <option>{{$months[$i]}}</option>
                                    @endif
                                @endfor
                              </select>
                              @error('end_month')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-6">
                                <label for="end_day">Día:</label>
                                <input type="hidden" id="dayEndHidden" value="{{$periodDate['date-end'][0]}}">
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
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id_level">Selecciona el nivel del lenguaje</label>
                        <select id="id_level" class="form-control" name="id_level">
                            <option selected hidden disabled>Seleccionar</option>
                            @foreach ($levelsLang as $level)
                                @if ($level->id==$period->level->id)
                                    <option selected value="{{$level->id}}">{{$level->name_level}}</option>
                                @else
                                    <option value="{{$level->id}}">{{$level->name_level}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_level')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>Estado del grupo</label>
                        </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isActive" id="inlineRadio1" value="1"
                                {{ ($period->isActive==1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Activo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isActive" id="inlineRadio2" value="0"
                                {{ ($period->isActive==0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="id_class_time">Selecciona el horario para el grupo</label>
                <select id="id_class_time" class="form-control" name="id_class_time">
                    <option selected hidden disabled>Seleccionar</option>
                    @foreach ($class_times as $class)
                        @if ($class->id==$period->class_time->id)
                            <option selected value="{{$class->id}}">
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
                        @else
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
                        @endif
                    @endforeach
                </select>
                @error('id_class_time')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12 d-grid gap-2 pt-4">
              <button class="btn btn-primary" type="submit">Modificar</button>
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
      <h5>Title</h5>
      <p>Sidebar content</p>
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
        const yearIn = document.getElementById('yearDate')

        // agregamos los siguientes elementos
        y=y-1;
        for (let i = 1; i <= 5; i++){
            y=y+1
            if (yearIn.value==y) {
                let op = document.createElement('option');
                op.textContent=y;
                op.selected='true';
                year.appendChild(op)
            }else{
                let op = document.createElement('option');
                op.textContent=y;
                year.appendChild(op)
            }
        }

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
                if (document.getElementById('dayStartHidden') != null && document.getElementById('dayStartHidden').value == i&&month == document.getElementById('monthStartHidden').value) {
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                option.selected = true;
                start_day.appendChild(option);
            }else{
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                start_day.appendChild(option);
            }
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
                if (document.getElementById('dayEndHidden') != null && document.getElementById('dayEndHidden').value == i&&month == document.getElementById('monthEndHidden').value) {
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                option.selected = true;
                end_day.appendChild(option);
            }else{
                var option = document.createElement("option");
                option.textContent = i;
                option.value = i;
                end_day.appendChild(option);
            }
        }
    }
  </script>
@endsection
