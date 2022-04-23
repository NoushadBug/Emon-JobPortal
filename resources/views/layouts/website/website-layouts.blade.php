<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('page-title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon-32x32.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Css -->
  @include('layouts.website.partials.website-css')
  <!-- Page-Style -->
  @stack('page-style')
</head>
<body>
  <!-- ======= Header ======= -->
  @include('layouts.website.partials.website-header')
  <!-- ======= Matrials Section ======= -->
  @yield('page-content')
  <!-- End Matrials -->
  <!-- ======= Footer ======= -->
  @include('layouts.website.partials.website-footer')
  <!-- ======= Js ======= -->
  @include('layouts.website.partials.website-js')
  <!-- ======= Page Script ======= -->
  @stack('page-script')
</body>
</html>