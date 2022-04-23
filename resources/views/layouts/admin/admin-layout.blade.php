<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Css -->
  @include('layouts.admin.partials.css')
  <!-- Page-css -->
  @stack('page-css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Header -->
  @include('layouts.admin.partials.header')
  <!-- Sidebar -->
  @include('layouts.admin.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('page-content')
  <!-- Footer -->
  @include('layouts.admin.partials.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Js -->
@include('layouts.admin.partials.js')
<!-- Page Script -->
@stack('page-js')
</body>
</html>
