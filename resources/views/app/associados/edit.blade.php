@extends('app.layouts.dashboard')

@section('title', 'Actualizar Associado - CSocial')
@section('associado', 'active')

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
          <h5 class="card-title">Actualizar Associado</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('associado.update', $associado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome do Associado</label>
                  <input name="nome" type="text" class="form-control" placeholder="Digite o nome do associado" value="{{ old('nome', $associado->nome) }}" required autofocus />
                  @error('nome')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Número do Bilhete de Identidade</label>
                        <input name="bi" type="text" class="form-control" placeholder="Digite o número do bilhete de identidade do associado" value="{{ old('bi', $associado->bi) }}" required />
                        @error('bi')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                      </div>
                  </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Data de Nascimento</label>
                  <input type="date" name="data_nascimento" class="form-control"  value="{{ old('data_nascimento', $associado->data_nascimento) }}" required />
                  @error('data_nascimento')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label >Género</label>
                    <select class="form-control" name="genero" required >
                      <option selected disabled>Escolha um género</option>
                      @foreach (['Masculino', 'Feminino'] as $key => $genero)
                      <option value="{{ $key }}" {{ old('genero', $associado->genero) == $key ? 'selected' : '' }}>{{ $genero }}</option>
                      @endforeach
                    </select>
                    @error('genero')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Residência</label>
                  <textarea name="residencia" class="form-control textarea">{{ old('residencia', $associado->residencia) }}</textarea>
                  @error('residencia')
                  <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="{{ route('associado.index') }}" class="btn btn-warning">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Associado</button>
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
