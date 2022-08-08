<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report - CELUT</title>
    <style>
        body {
            margin: 0px;
        }
        .nav-item > a {
            color: white;
        }
        .nav-item > a:hover {
            color: white;
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<body id="body">
    <nav class="navbar navbar-light" style="border-bottom: 2px; border-bottom-color:black">
        <div class="container">
            <a class="navbar-brand" href="#">Reporte de periodo CELUT</a>
            <button id="menuBtn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse mt-3" id="navbarText"
                style="background-color:#0000CC; color:rgb(255, 255, 255); border-radius:5px;"
            >
                <div class="m-3">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/panel">Panel</a>
                      </li>
                      <li class="nav-item">
                        <a id="toPdf" class="nav-link">Generar pdf</a>
                      </li>
                    </ul>
                </div>
            </div>
          </div>

    </nav>

    <div class="container mt-3">
        <h3 class="display-2" style="font-size: 25px;"><i class="bi bi-info-square-fill"></i> Información del periodo</h3>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Periodo</th>
                  <th scope="col">Año</th>
                  <th scope="col">Fecha de solicitud</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td id="period">{{$metrics['data']['period']['startMonth']}}-{{$metrics['data']['period']['endMonth']}}</td>
                    <td id="year">{{$metrics['data']['period']['year']}}</td>
                    <td id="dateReport">{{date('d')}}/{{date('m')}}/{{date('Y')}}</td>
                  </tr>
              </tbody>
        </table>
        <h3 class="display-2" style="font-size: 25px;"><i class="bi bi-pie-chart-fill"></i> Estádisticas</h3>

        <div class="row mt-3">
            <div class="col-md-6">
                <h3 class="display-2" style="font-size: 20px;"><i class="bi bi-bar-chart-steps"></i> Gráfico comparación niveles</h3>
                <div class="card">
                    <div class="card-body">
                      <canvas id="levels" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="display-2" style="font-size: 20px;"><i class="bi bi-info-lg"></i> Datos de alumnado</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Estudiantes de la UTTN</td>
                        <td>{{$metrics['data']['metrics']['students']}}</td>
                    </tr>
                    <tr>
                        <th>No estudiantes de la UTTN</td>
                        <td>{{$metrics['data']['metrics']['noStudents']}}</td>
                    </tr>
                    <tr>
                        <th>Total</td>
                        <td>{{$metrics['data']['metrics']['totalStudents']}}</td>
                    </tr>
                </table>

                <h3 class="display-2 mt-2" style="font-size: 20px;"><i class="bi bi-info-lg"></i> Información de pagos</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Pagos realizados</td>
                        <td>{{$metrics['data']['metrics']['paymentsDone']}}</td>
                    </tr>
                    <tr>
                        <th>Pagos no realizados</td>
                        <td>{{$metrics['data']['metrics']['paymentsDontDone']}}</td>
                    </tr>
                </table>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>Pagos realizados de estudiantes de la UTTN</td>
                        <td>${{$metrics['data']['monetary']['students']}}</td>
                    </tr>
                    <tr>
                        <th>Pagos realizados de estudiantes</td>
                        <td>${{$metrics['data']['monetary']['noStudents']}}</td>
                    </tr>
                    <tr>
                        <th>Cantidad Total</td>
                        <td>${{$metrics['data']['monetary']['total']}}</td>
                    </tr>
                </table>
                <h3 class="display-2 mt-2" style="font-size: 20px;"><i class="bi bi-info-lg"></i> Información de grupos</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Grupos activos</td>
                        <td>{{$metrics['data']['metrics']['gruposActivos']}}</td>
                    </tr>
                    <tr>
                        <th>Grupos inactivos</td>
                        <td>{{$metrics['data']['metrics']['gruposInactivos']}}</td>
                    </tr>
                    <tr>
                        <th>Grupos Totales</td>
                        <td>{{$metrics['data']['metrics']['gruposTotales']}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded',()=>{
        const html2pdfBtn = document.getElementById('toPdf');
        const $body =document.getElementById('body')
        html2pdfBtn.addEventListener('click',()=>{
            var ahora = new Date();
            var milisegundos = ahora.getMilliseconds();
            document.getElementById('menuBtn').click()
            var opt = {
                margin:       0,
                filename:     'reporte-periodo-celut-'+document.getElementById('dateReport').textContent+'-'+document.getElementById('period').textContent+'-'+document.getElementById('year').textContent+'-'+milisegundos,
                image:        { type: 'jpeg', quality: 2 },
                html2canvas:  { scale: 2, letterRendering:true },
                jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from($body).save().finally(location.reload());
        })
    })


    var levelsLabels =  {{ Js::from($metrics['data']['metrics']['levels']) }};
    var levelsData =  {{ Js::from($metrics['data']['metrics']['levelsValues']) }};

    const data = {
      labels: levelsLabels,
      datasets: [{
        label: 'Estudiantes',
        backgroundColor: '#0000CC',
        borderColor: '#0000CC',
        fill: false,
        data: levelsData,
        borderWidth: 1
      }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
        }
    };

    const myChart = new Chart(
      document.getElementById('levels'),
      config
    );
</script>
</body>
</html>
