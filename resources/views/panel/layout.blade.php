<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Celut | Panel</title>

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
<!-- REQUIRED SCRIPTS -->


</body>
</html>
