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
  <title>Celut | Panel</title>

  <style>
    .ul-users-menu {
        background-color: #009879 !important;
        border-radius: 5px
    }


    .ul-users-menu > li > a > p {
        color: rgba(0, 0, 0, 0.904) !important;
        /* color: #009879 !important; */
    }

    .ul-users-menu > li > a > i {
        color: rgba(0, 0, 0, 0.904) !important;
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
        color: #202020 !important;
    }

    .navbar-white {
        background-color: #009879 !important;
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
</body>
</html>
