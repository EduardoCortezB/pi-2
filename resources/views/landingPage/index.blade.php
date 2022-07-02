@extends('layout')
@section('title', 'Inicio')
@section('title-description', 'Página de inicio del celut.')

@section('content-html')
      <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Centro de Lenguas Ut</h1>
          <h2>Preinscribete ahora y disfruta el aprendizaje de un nuevo Idioma.</h2>
          <a href="{{route('register-candidate')}}" class="btn-get-started scrollto">Preinscribete aquí</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
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
              <a href="/aboutus" class="about-btn"><span>Acerca de nosotros</span> <i class="bx bx-chevron-right"></i></a>
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
    <section id="tabs" class="tabs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Niveles</h2>
            <p>Conoce los niveles y su descripción.</p>
          </div>

        <ul class="nav nav-tabs row d-flex justify-content-md-center">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4 class="d-none d-lg-block">NIVELES A1 Y A2</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4 class="d-none d-lg-block">NIVEL B1</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4 class="d-none d-lg-block">NIVEL B2</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <h4 class="d-none d-lg-block">NIVEL C1</h4>
            </a>
          </li>
          <li class="nav-item col-3 mt-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-5">
              <h4 class="d-none d-lg-block">NIVEL C2</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
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
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Nivel B1, intermedio.</h3>
                <p>
                    Poder expresarte con soltura y fluidez en Inglés.
                </p>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
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
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
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
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
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

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>(FAQ) Preguntas Frecuentes</h2>
        </div>

        <ul class="faq-list accordion" data-aos="fade-up">

          <li>
            <a data-bs-toggle="collapse" class="" data-bs-target="#faq1" aria-expanded="true">¿Cuáles son los costos? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq1" class="collapse show" data-bs-parent=".faq-list" style="">
                <div>
                    <p><b>Costos</b></p>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <p>• Colegiatura $1,800 para estudiantes de la <b>UTTN</b>.</p>
                            </tr>
                            <tr>
                                <p>• Colegiatura $2,400 para externos.</p>
                            </tr>
                        </tbody>
                    </table>
                    <p>La duración del curso son 10 Semanas, 60 Horas.</p>
                </div>
              </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">¿Cuál es la duración del curso? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                La duración del curso es de 10 Semanas 60 horas.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">¿Cuáles son los beneficios del CELUT? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <p>• NO COBRAMOS INSCRIPCIÓN</p>
                        </tr>
                        <tr>
                            <p>• ÙNICO PAGO POR 4 MESES</p>
                        </tr>
                        <tr>
                            <p>• EL PRECIO MÀS ECONÒMICO EN LA REGIÓN</p>
                        </tr>
                        <tr>
                            <p>• OBTENIENDO EL NIVEL B1 APLICAN PARA CONVOCATORIAS INTERNACIONALES:
                                FRANCIA,CANADA,ESTADOS UNIDOS</p>
                        </tr>
                        <tr>
                            <p>                • UBICACIÓN DE LA OFICINA DEL CENTRO DEL LENGUAS UT ESTA DENTRO DEL
                                CAMPUS(CARRERA DE MANTENIMIENTO)</p>
                        </tr>
                        <tr>
                            <p>                • HORARIOS FLEXIBLES</p>
                        </tr>
                    </tbody>
                </table>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Opciones de becas a Canadá <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <p>1. BECA ELAP- El recurso económico es canadiense. Tienes que pagar
                                todo y llegando a Canadá se te reembolsan. Inversión aproximadamente. $40k pesos.
                                Se abren plazas febrero de cada año. A partir de 5to cuatrimestree
                                Ingeniería. Para personas que hablan Inglés o Francés. Debes pagar tu
                                certificación de idioma.</p>
                        </tr>
                        <tr>
                            <p>2. BECA MOVILIDAD INTERNACIONAL CANADA BIS - El recurso
                                económico es de gobierno mexicano. Solo para alumnos de TSU de
                                BIS .Debes pagar tu ITEP Plus con B1 mínimo.Promedio de 9.</p>
                        </tr>
                        <tr>
                            <p>3. BECA MOVILIDAD INTERNACIONAL QUEBEC-El recurso económico
                                es de gobierno mexicano.Solo para alumnos de TSU que no
                                quedaron en MEXPROTEC.Promedio de 9.</p>
                        </tr>
                    </tbody>
                </table>
            </div>
          </li>
        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>Puedes ponerte en contacto con nosotros desde este formulario, yendo a nuestro Centro de Lenguas, email o por Whatsapp.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Dirección</h3>
                  <p>Pedro Villar 243, Sin Nombre de Col 23, 88680 Reynosa, Tamps.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email</h3>
                  <p>centro.lenguasut@uttn.mx</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Whatsapp ó Llamada</h3>
                  <p>899 920 1216<br>899 920 1666<br>Ext. 22254</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection
