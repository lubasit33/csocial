@extends('app.layouts.dashboard')

@section('title', 'Actualizar Conta - CSocial')
@section('conta', 'active')

@section('css')
{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Actualizar Conta</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('conta.update', $conta->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label >Titular</label>
                        <select class="form-control" name="titular" required >
                          <option selected disabled>Escolha o titular da conta</option>
                          @foreach ($associados as $associado)
                          <option value="{{ $associado->id }}" {{ old('titular', $conta->titular) == $associado->id ? 'selected' : '' }}>{{ $associado->nome }}</option>
                          @endforeach
                        </select>
                        @error('titular')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Número de Conta</label>
                      <input name="numero_conta" type="text" class="form-control" placeholder="Digite o número de conta" value="{{ old('numero_conta', $conta->numero_conta) }}" required />
                      @error('numero_conta')
                      <small style="color: red;">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label >Avalista</label>
                            <select class="form-control" name="avalista_id" required >
                          <option selected disabled>Escolha o avalista da conta</option>
                          @foreach ($avalistas as $avalista)
                          <option value="{{ $avalista->id }}" {{ old('avalista_id', $conta->avalista_id) == $avalista->id ? 'selected' : '' }}>{{ $avalista->nome }}</option>
                          @endforeach
                        </select>
                        @error('avalista_id')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Data de Abertura da Conta</label>
                  <input type="date" name="data_abertura" class="form-control"  value="{{ old('data_abertura', $conta->data_abertura) }}" required />
                  @error('data_abertura')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="{{ route('conta.index') }}" class="btn btn-warning btn-round">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-round">Actualizar Conta</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="../{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
@endsection
