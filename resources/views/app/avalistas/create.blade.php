@extends('app.layouts.dashboard')

@section('title', 'Cadastrar Avalista - CSocial')
@section('avalista', 'active')

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
          <h5 class="card-title">Cadastrar Avalista</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('avalista.store') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome do Avalista</label>
                  <input name="nome" type="text" class="form-control" placeholder="Digite o nome do avalista" value="{{ old('nome') }}" required autofocus />
                  @error('nome')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Data de Início das Funções</label>
                  <input type="date" name="data_inicio_funcoes" class="form-control"  value="{{ old('data_inicio_funcoes') }}" required />
                  @error('data_inicio_funcoes')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label >Salário</label>
                    <input type="number" name="salario" class="form-control" placeholder="Digite o salário do avalista" min="0" value="{{ old('salario') }}"  required />
                    @error('salario')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Local de Trabalho</label>
                  <textarea name="local_trabalho" class="form-control textarea">{{ old('local_trabalho') }}</textarea>
                  @error('local_trabalho')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="{{ route('avalista.index') }}" class="btn btn-warning">Cancelar</a>
                <button type="submit" class="btn btn-primary">Cadastrar Avalista</button>
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
