<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/style.css') }}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">


</head>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('backend.components.header')

@include('backend.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  {{-- @include('backend.components.breadcrumbs') --}}


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      @yield('content')

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('backend.components.footer')


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->

<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->

<script src="{{ asset('assets/backend/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->

<script src="{{ asset('assets/backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->

<!-- <script src="{{ asset('assets/backend/dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/backend/dist/js/pages/dashboard3.js') }}"></script>
 <!-- Other script tags... -->
<!-- Summernote -->
<script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>





<!-- Page specific script -->
<script>
    $(function () {


      // Summernote
      $('#summernote').summernote({
                height: 100
   });

    })
  </script>





</body>
</html>
