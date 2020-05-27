<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Control Comercializadora</title>


  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <p><b>Control Comercializadora</b></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i>
          </span>
            <input id="user" type="user" class="form-control" name="user" value="{{ old('usuario') }}" placeholder="usuario" required autofocus>
            @if ($errors->has('user'))
                <span class="help-block">
                    <strong>{{ $errors->first('user') }}</strong>
                </span>
            @endif
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="******" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ URL::asset('js/jquery.js')}}"></script>
  <script src="{{ URL::asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{ URL::asset('js/jquery-1.8.3.min.js')}}"></script>


  <script>
        $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
      </script>
      <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                  case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                  
                  case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                  case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                  case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
                }
            @endif
        </script>

</html>