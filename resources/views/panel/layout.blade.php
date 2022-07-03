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
    }

    .ul-users-menu > li > a > i {
        color: rgba(0, 0, 0, 0.904) !important;
    }
</style>

  @include('panel.pages.head')
  @yield('styles')


  @include('panel.pages.scripts')
  @yield('scripts')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('panel.pages.nav')


@yield('content-page')

@include('panel.pages.footer')
</body>
</html>
