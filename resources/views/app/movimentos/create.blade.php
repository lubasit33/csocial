@extends('app.layouts.dashboard')

@section('title', 'Fazer Movimento - CSocial')
@section('movimento', 'active')

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
          <h5 class="card-title">Fazer Movimento</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('movimento.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Valor do Movimento</label>
                        <input type="number" min="0" name="valor" class="form-control" placeholder="Digite o valor do movimento" required/>
                        @error('valor')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label >Tipo de Movimento</label>
                        <select class="form-control" name="categoria_id" required >
                            <option selected disabled>Escolha o tipo de movimento</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ ucwords($categoria->nome) }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label >Conta</label>
                        <select class="form-control" name="conta_id" required >
                            <option selected disabled>Escolha a conta</option>
                            @foreach ($contas as $conta)
                            <option value="{{ $conta->id }}" {{ old('conta_id') == $conta->id ? 'selected' : '' }}>{{ $conta->numero_conta }}</option>
                            @endforeach
                        </select>
                        @error('conta_id')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Data do Movimento</label>
                        <input type="date" name="data_movimento" class="form-control"  value="{{ old('data_movimento') }}" required />
                        @error('data_movimento')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="{{ route('movimento.index') }}" class="btn btn-warning">Cancelar</a>
                <button type="submit" class="btn btn-primary">Fazer Movimento</button>
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
