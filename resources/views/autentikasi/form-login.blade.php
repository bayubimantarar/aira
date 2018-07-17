<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Login | PT. Aira</title>

  <!-- External fonts -->
  <link href="https://brick.a.ssl.fastly.net/Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- NPM Packages -->
  <link href="{{ asset('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Vendor -->
  <link href="{{ asset('/assets/vendor/md-snackbars/md-snackbars.min.css') }}" rel="stylesheet">

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

    <div class="page-content full-width">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto">

            <div class="page-brand">
              <h2><b>PT. Aira Wisata Mandiri</b></h2>
            </div>
            @if($errors->has('notification'))
            <div id="notification" class="alert alert-danger alert-dismisable" role="alert"> <strong>{{ $errors->first('notification') }}</strong></div>
            @endif
            <div class="card card-default widget">
              <div class="card-heading">
                <h3 class="card-title">Login</h3>
              </div>
              <div class="card-body">
                <form action="/autentikasi/login" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
                </form>

                <div class="margin-tb-10">
                  <a href="#">Lupa Password?</a>
                </div>
              </div>
            </div>

            {{-- <div class="text-center">
              <span class="text-muted">Dont have an account?</span> <a href="page-register.html">Sign Up</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /#wrapper -->

  <!-- NPM Packages -->
  <script src="{{ asset('/node_modules/jquery/dist/jquery.min.js') }}"></script>

  <script src="{{ asset('/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <!-- Vendor -->
  <script src="{{ asset('/assets/vendor/md-snackbars/md-snackbars.min.js') }}"></script>

  <!-- Theme -->
  <script src="{{ asset('/assets/js/spark.js') }}"></script>

  <script>
  $(document).ready(function () {
    Spark.init();
    // $('#notification').show(0).delay(5000).hide(0);
  });
  </script>

</body>
</html>
