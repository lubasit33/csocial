@extends('app.layouts.dashboard')

@section('title', 'Total de Depósitos - CSocial')
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
            <h5 class="card-title">Encontrar o total de depósito da conta {{ $conta->numero_conta }}</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('conta.totalDeposito', $conta->id) }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Data de Início</label>
                    <input type="date" name="data_inicio" class="form-control"  value="{{ old('data_inicio') }}" required />
                    @error('data_inicio')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Data de Fim</label>
                    <input type="date" name="data_fim" class="form-control"  value="{{ old('data_fim') }}" required />
                    @error('data_fim')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                    <a href="{{ route('conta.index') }}" class="btn btn-warning">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Encontrar o total de Depósito</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    @if (isset($depositos))
    @php
        function dataPT($dataEN) {
            return date_format(date_create($dataEN), 'd/m/Y');
        }
    @endphp
    <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header">
            <h4 class="card-title"> Depósitos da Conta {{ $conta->numero_conta }}</h4>
            <p class="card-category">Todos os depósitos da conta {{ $conta->numero_conta }} no período de {{ dataPT($dataInicio) }} até {{ dataPT($dataFim) }}.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>#</th>
                  <th>Data</th>
                  <th>Valor</th>
                </thead>
                <tbody>
                  @foreach ($todosDepositos as $key => $deposito)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $deposito->dataMovimento() }}</td>
                    <td>{{ $deposito->valor }}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b>{{ $depositos }}</b> Kzs</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
    @endif
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
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  <script>
    @if (session('success'))
        demo.showNotification('success', 'nc-icon nc-check-2', "{{ session('success') }}", 10, 'top', 'right')
    @endif
</script>
@endsection
