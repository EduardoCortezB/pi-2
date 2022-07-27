@extends('layout')
@section('title', 'Acerca de')
@section('title-description', 'El Centro de Lenguas de la Universidad Tecnológica, tiene como objetivo general: Brindar soporte académico principalmente la lengua Inglesa tanto a profesores y estudiantes como a personal administrativo, para contribuir al logro de metas y objetivos')

@section('styles')
    <style>
        .title-about {
            font-family: "Raleway", sans-serif;
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2;
            color: var(--bs-heading-color);
            font-weight: 600;
            font-size: 26px;
        }

        .p-about p{
            margin-bottom: 10px;
            margin-top: 10px;
            font-family: "Open Sans", sans-serif;
            color: #444444;
        }

        .p-f p{
            margin-bottom: 10px;
            margin-top: 10px;
            font-family: "Open Sans", sans-serif;
            color: #f8f8f8;
        }
    </style>
@endsection

@section('content-html')
<section class="breadcrumbs">
    <div class="container">
    <ol>
        <li><a href="/">INICIO</a></li>
        <li>ACERCA DE</li>
    </ol>
    <h2>ACERCA DEL CENTRO DE LENGUAS UT.</h2>
</div>
</section>

  <main id="main">
    <section class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 p-about">
              <h1 class="title-about">Nuestra Infraestructura</h1>
              <table class="table table-sm">
                <tbody>
                    <tr>
                        <p>• <b> Clases en:</b> "E" PROCESOS INDUSTRIALES/ADMINISTRACION Y CEIT.</p>
                    </tr>
                    <tr>
                        <p>•<b> Contamos con equipo especializado:</b> Se adapta el aula de
                            informática situada en la planta baja del CEIT para
                            convertirla en un laboratorio de idiomas, es decir, un
                            laboratorio multimedia virtual para la práctica de todas las
                            habilidades del idioma; leer, hablar, escuchar y escribir.
                            Actualmente el aula cuenta con 32 computadoras con
                            procesador Intel Core i7,8Gb de RAM,ypantalla plana,
                            con conectividad LAN</p>
                    </tr>
                    <tr>
                        <p>•<b> Plataforma:</b> My English Lab.</p>
                    </tr>
                    <tr>
                        <p>•<b> Maestros Certificados</b>.</p>
                    </tr>
                    <tr>
                        <p>•<b> Plan de estudios especializado</b>.</p>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="{{asset('img/image-celut-01.png')}}" alt="" class="img-fluid">
            </div>
          </div>
    </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="content col-xl-6 d-flex align-items-stretch">
            <div class="content">
              <h3>Centro de Lenguas UT</h3>
              <p>
                El Centro de Lenguas de la Universidad Tecnológica, tiene como objetivo general:
              </p>
            </div>
          </div>
          <div class="content col-xl-6 d-flex align-items-stretch">
            <div class="content">
                <i style="font-size: 40px" class="bx bx-receipt"></i>
                <h4>Objetivo General</h4>
                <p>Brindar soporte académico principalmente la lengua Inglesa tanto a profesores y estudiantes como a personal administrativo, para contribuir al logro de metas y objetivos.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs" style="padding-top: 0px !important;padding-buttom: 120px !important;
    overflow: hidden;
    position: relative;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Niveles</h2>
            <p>Conoce los niveles y su descripción.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <ul class="nav nav-tabs row d-flex justify-content-md-center">
                    <li class="nav-item col-3">
                      <a class="nav-link active show" style="padding: 0px !important;" data-bs-toggle="tab" data-bs-target="#tab-1">
                        <p class="d-lg-block mt-3">NIVEL A1 Y A2</p>
                      </a>
                    </li>
                    <li class="nav-item col-3">
                      <a class="nav-link" style="padding: 0px !important;" data-bs-toggle="tab" data-bs-target="#tab-2">
                        <p class="d-lg-block mt-3">NIVEL B1</p>
                      </a>
                    </li>
                    <li class="nav-item col-3">
                      <a class="nav-link" style="padding: 0px !important;" data-bs-toggle="tab" data-bs-target="#tab-3">
                        <p class="d-lg-block mt-3">NIVEL B2</p>
                      </a>
                    </li>
                    <li class="nav-item col-3">
                      <a class="nav-link" style="padding: 0px !important;" data-bs-toggle="tab" data-bs-target="#tab-4">
                        <p class="d-lg-block mt-3">NIVEL C1</p>
                      </a>
                    </li>
                    <li class="nav-item col-3 mt-3">
                      <a class="nav-link" style="padding: 0px !important;" data-bs-toggle="tab" data-bs-target="#tab-5">
                        <p class="d-lg-block mt-3">NIVEL C2</p>
                      </a>
                    </li>
                  </ul>
            </div>
            <div class="col-md-6">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <div class="row">
                        <div class="order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                          <h3>Niveles A1 y A2. Esencial.</h3>
                          <p>
                              <b>A1 Esencial: </b>
                              Desarrollar las bases de las habilidades de leer, escribir, entender y
                              hablar.
                          </p>
                          <p>
                              <b>A2 Básico: </b>
                              Poder expresarte en Inglés en forma básica y simple; además de
                              seguir aprendiendo.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                      <div class="row">
                        <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                          <h3>Nivel B1, intermedio.</h3>
                          <p>
                              Poder expresarte con soltura y fluidez en Inglés.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                      <div class="row">
                        <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                          <h3>Avanzado Nivel B2.</h3>
                          <p>
                              Adquirir vocabulario y estructuras gramaticales complejas que
                              permitirán desenvolverte en cualquier conversación en Inglés.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                      <div class="row">
                        <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                          <h3>Profesional C1</h3>
                          <p>
                              Hablar y refutar en una conversación compleja en Inglés, además de
                              producir cualquier tipo de texto e información en Inglés. Acreditar
                              certificaciones como TOEFL,ITP,TOEIC.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-5">
                      <div class="row">
                        <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                          <h3>Nivel C2 Maestria.</h3>
                          <p>
                              Hablar y refutar en una conversación compleja en Inglés, además de
                              producir cualquier tipo de texto e información en Inglés. Acreditar
                              certificaciones como TOEFL, ITP, TOEIC.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>
    </section><!-- End Tabs Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cursos</h2>
          <p>Tenemos diversos lenguajes los cuales puedes elegir.</p>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i><img src="https://cdn-icons-png.flaticon.com/512/940/940207.png" width="40px" alt="USA FLAG"></i>
              <h4><a href="#">Inglés</a></h4>
              <p>Tenemos este idioma disponible en nuestro centro de lenguas, en los niveles A1.1, A1.2, B1, B2</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>¿¡Necesitas saber más!?</h2>
          <p>Si no sabes cómo comenzar lee nuestro listado de preguntas frecuentes <a href="/#faq">FAQ</a> o <a href="/#contact">contactanos</a></p>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="icon-box text-center text-white" data-aos="fade-up" data-aos-delay="100">
              <p>O bien registrate en nuestra plataforma e inscribete al CELUT.</p>
              <a href="{{route('register-candidate')}}" class="btn-get-started scrollto btn text-white">Preinscribete aquí</a>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main><!-- End #main -->
@endsection
