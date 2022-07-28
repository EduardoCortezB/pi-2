<!DOCTYPE html>
<!--
This web page was developed by Jesus Eduardo Banda Cortez for CELUT of UTTN as Integrator Project.
If you will modify any module of this web app create a new version when end.
    - Version 1.0 lastest
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://www.uttn.edu.mx/wp-content/uploads/2017/07/cropped-logo-ut-32x32.png" rel="icon">
  <title>Celut | Panel</title>

  <style>
    .ul-users-menu {
        background-color: #0000CC !important;
        border-radius: 5px
    }

    .nav-item > .nav-link{
        color: rgba(255, 255, 255, 0.904) !important;
    }

    .ul-users-menu > li > a > p {
        color: rgba(255, 255, 255, 0.904) !important;
        /* color: #009879 !important; */
    }

    .ul-users-menu > li > a > i {
        color: rgba(255, 255, 255, 0.904) !important;
        /* color: #009879 !important; */
    }

    h1, h2, h3, h4, h5, h6, p , span{
        font-family: "Raleway", sans-serif;
    }

    [class*="sidebar-dark"] .user-panel {
        border-bottom:1px solid #e4dedeb6 !important;
    }

    [class*="sidebar-dark"] .brand-link {
        border-bottom: 1px solid #e4dedeb6 !important;
    }

    .sidebar-dark-primary{
        background-color: #ffffff !important;
        text-decoration: none;
        background-color: transparent;
    }
    [class*="sidebar-dark-"] .sidebar a {
        color: #000000 !important;
    }

    .navbar-white {
        background-color: #0000CC !important;
        color: #ffffff !important;
    }


</style>

  @include('panel.pages.head')
  @yield('styles')


  @include('panel.pages.scripts')
  @yield('scripts')
<script type="text/javascript">
    let resizeObserver = new ResizeObserver((e) => {
        let imgNav= document.getElementById('img-Nav');
        let imgDiv = document.getElementById('img-rend')
        if (imgDiv.clientWidth <= 205) {
            imgNav.style='display: none';
        }else if (imgDiv.clientWidth >= 205) {
            imgNav.style='display: show';
        }
    });
    document.addEventListener('DOMContentLoaded',()=>{
        resizeObserver.observe(document.getElementById('img-rend'));
    })
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('panel.pages.nav')


@yield('content-page')

@include('panel.pages.footer')
<script>
$(document).ready( function () {
    try {
        if (document.querySelectorAll('table')[0].getAttribute('nonDatatable')!=null) return
        $(document.querySelectorAll('table')[0]).DataTable( {
            'order': [[0, 'desc']],
            dom: 'Bfrtip',
            columnDefs: [
                {
                    targets: -1,
                    visible: true
                }
            ],
            buttons: [

                'copy', 'csv', 'excel', 'pdf',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, 'colvis'

            ]
        } );
        document.querySelectorAll('table')[0].style=''
    } catch (error) {

    }
 } );
</script>
</body>
</html>
