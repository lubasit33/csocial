<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}">
  <link rel="stylesheet" href="{{ asset('assets/demo/demo.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
  <title>Entrar - CSocial</title>
  <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
</head>
<body class="demo-icons">
  <header>
    <h1>Caixa Social</h1>
    <p>Entrar no <a href="{{ url('/') }}">CSocial</a></p>
  </header>
  <div class="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Digite o seu email" value="{{ old('email') }}" required autofocus />
                        @if ($errors->any())
                            <small style="color: red;">E-mail ou senha errada.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="Digite a sua senha" required autocomplete="current-password" />
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" />
                            {{ __('Remember me') }}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                          <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        </div>
                      </div>
                    {{-- <button type="submit" class="btn btn-primary btn-round">Entrar</button> --}}
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
  </div>
</body>
</html>
