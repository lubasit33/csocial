<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title', 'Dashboard - CSocial')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  @yield('css')
</head>
<body class="">
  <div class="wrapper ">
    @include('app.partials.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('app.partials.navbar')
      <!-- End Navbar -->
      <div class="content">
        @yield('content')
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
                © <script>document.write(new Date().getFullYear())</script>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  @yield('js')
</body>
</html>
