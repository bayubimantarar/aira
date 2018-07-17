<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="favicon.ico">

  <title>@yield('title') | PT. Aira Wisata Mandiri</title>

  <!-- External fonts -->
  <link href="https://brick.a.ssl.fastly.net/Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- NPM Packages -->
  <link href="{{ asset('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/summernote/dist/summernote.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/morris.js/morris.css') }}" rel="stylesheet">

  <!-- Vendor -->
  <link href="{{ asset('/assets/vendor/md-snackbars/md-snackbars.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/zabuto/zabuto_calendar.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <!-- Theme -->
  <link href="{{ asset('/assets/css/spark.css') }}" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class=""> <!-- right-to-left -->

  <div class="splash active">
    <div class="icon"></div>
  </div>

  <div class="wrapper">
    <!-- Navigation bar -->
    @include('layout.navbar')
    <!-- /Navigation bar -->
    <!-- .content -->
    <div class="content">
      <!-- content page header -->
      @include('layout.page-header')
      <!-- /content page header -->
      <!-- .content page body -->
      <div class="page-body">
        <div class="container-fluid">
          @include('layout.page-sidebar')
          <div class="page-content">
            @yield('content')
            @include('layout.footer')
          </div>
        </div>
      </div>
      <!-- /.content page body -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.wrapper -->

  <!-- NPM Packages -->
  <script src="{{ asset('/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/node_modules/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('/node_modules/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('/node_modules/flot/jquery.flot.crosshair.js') }}"></script>
  <script src="{{ asset('/node_modules/flot/jquery.flot.stack.js') }}"></script>
  <script src="{{ asset('/node_modules/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('/node_modules/bxslider/dist/jquery.bxslider.min.js') }}"></script>
  <script src="{{ asset('/node_modules/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('/node_modules/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('/node_modules/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
  <script src="{{ asset('/node_modules/summernote/dist/summernote.min.js') }}"></script>
  <script src="{{ asset('/node_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('/node_modules/morris.js/morris.min.js') }}"></script>
  <script src="{{ asset('/node_modules/raphael/raphael.min.js') }}"></script>

  <!-- Vendor -->
  <script src="{{ asset('/assets/vendor/flot/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/mark/jquery.mark.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/md-snackbars/md-snackbars.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Theme -->
  <script src="{{ asset('/assets/js/spark.js') }}"></script>
  <script src="{{ asset('/assets/js/pages/dashboard.js') }}"></script>

  <script>
    $(document).ready(function () {
      Spark.init();
      Page.init();
    });
  </script>

  @stack('javaScript')

</body>
</html>
