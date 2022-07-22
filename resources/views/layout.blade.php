<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CELUT - @yield('title')</title>
  <meta content="@yield('title-description')" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
    @include('landingPage.styles')
    @yield('styles')
    @include('landingPage.scripts')
    @yield('scripts')
</head>
<body>
    <!-- ======= Header ======= -->
    @include('landingPage.header')
    {{-- content of page --}}
    @yield('content-html')
    @include('landingPage.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
<script src="{{ asset('js/vendor/main-tmp.js'); }}"></script>

</html>
{{-- msmdn --}}
