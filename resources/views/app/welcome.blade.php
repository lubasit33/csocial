<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Página Inicial - CSocial</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
  <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="offline-doc">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="javascript:void(0);">CSocial</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" target="_blank">
              Tem alguma pergunta?
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-image: url('../assets/img/jan-sendereks.jpg');"></div>
    <div class="container text-center">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title">
            Caixa Social
          </h1>
          <h3 class="description">Gestão de Contas</h3>
          <br />
          @if (Route::has('login'))
            @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-round btn-lg">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-round btn-lg">Entrar</a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
      <div class="row">
        {{-- <nav class="footer-nav">
          <ul>
            <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
            <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
            <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
          </ul>
        </nav> --}}
        <div class="credits ml-auto">
          <span class="copyright">
            © <script>
              document.write(new Date().getFullYear())
            </script>
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! --> --}}
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
</body>
</html>
