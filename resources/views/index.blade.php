<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Control comercializadora</title>

 <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- owl carousel -->
  <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
  <link href="{{asset('css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
  <!-- Custom styles -->
  <link href="{{asset('css/widgets.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}" >
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('css/xcharts.min.css')}}" rel=" stylesheet">
  <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/lity.css')}}" rel="stylesheet">

  <link href="{{ URL::asset('css/select2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
 
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="/" class="logo">Control <span class="lite">Comercializadora</span></a>
      <!--logo end-->

{{--       <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div> --}}

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon_profile"></i>
                            <span class="username">{{ Auth::user()->nombre}}</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>

              <li>
                <a  href="{{ url('/logout') }}"  onclick="event.preventDefault();    document.getElementById('logout-form').submit();"><i class="  icon_lock-open_alt"></i> Salir </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
{{--               <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li> --}}
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            @if(Auth::user()->nivel == 1)
              <a class="" href="{{route('registro.index')}}">
            @else
              <a class=""  href="{{route('registro.index')}}">
            @endif
            
                          <i class="icon_house_alt"></i>
                          <span>
                            @if(Auth::user()->nivel == 1)
                              Administrador
                            @else 
                              Usuario
                            @endif
                          </span>
            </a>
          </li>
          {{-- altas administrador--}}
          @if(Auth::User()->nivel == 1)
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Altas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('user.index')}}">Usuarios</a></li>
              
              <li><a class="" href="{{route('aduanas.index')}}">Aduanas</a></li>             
              <li><a class="" href="{{route('clientes.index')}}">Clientes</a></li>              
              <li><a class="" href="{{route('ejecutivos.index')}}">Ejecutivos</a></li>
              <li><a class="" href="{{route('estatus.index')}}">Estatus</a></li>              
              <li><a class="" href="{{route('razon_social.index')}}">Razon Social Proveedores</a></li>
            </ul>
          </li>
          @else
          @endif

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">


    <div class="row">
          <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><b>@yield('panel','Inicio')</b></h3>
                <div class="panel-actions">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
               
                <section>
                  @yield('content')
                </section>
                
              </div>
            </div>
          </div>
      </div>
      </section>
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
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ URL::asset('js/jquery.js')}}"></script>
  <script src="{{ URL::asset('js/metodos.js')}}"></script>
  <script src="{{ URL::asset('js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{ URL::asset('js/jquery-1.8.3.min.js')}}"></script>
  <script src="{{ URL::asset('js/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{ URL::asset('js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ URL::asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="{{ URL::asset('js/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/owl.carousel.js')}}"></script>
 
    <!--script for this page only-->
    <script src="{{ URL::asset('js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{ URL::asset('js/jquery.customSelect.min.js')}}"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="{{ URL::asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ URL::asset('js/xcharts.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.autosize.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.placeholder.min.js')}}"></script>
    <script src="{{ URL::asset('js/gdp-data.js')}}"></script>
    <script src="{{ URL::asset('js/morris.min.js')}}"></script>
    <script src="{{ URL::asset('js/sparklines.js')}}"></script>
    <script src="{{ URL::asset('js/charts.js')}}"></script>
    <script src="{{ URL::asset('js/lity.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  




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

<script type="text/javascript">
        $(document).ready(function() {
        $("#aerolinea").select2();
         $("#agente").select2();
        });

</script>

</body>

</html>
