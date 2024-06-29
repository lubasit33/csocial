@extends('app.layouts.dashboard')

@section('title', 'Movimentos - CSocial')
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
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Todos os Movimentos</h4>
          <div class="text-right">
            <a href="{{ route('movimento.create') }}" class="btn btn-success">Fazer Movimento</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Valor</th>
                <th>Data</th>
                <th>Conta</th>
                <th>Categoria</th>
                <th>Titular</th>
                <th>Avalista</th>
                {{-- <th>Ações</th> --}}
              </thead>
              <tbody>
                @forelse ($movimentos as $movimento)
                <tr>
                    <td>{{ $movimento->valor }}</td>
                    <td>{{ $movimento->dataMovimento() }}</td>
                    <td><a href="{{ route('conta.show', $movimento->conta_id) }}">{{ $movimento->conta->numero_conta }}</a></td>
                    <td><a href="{{ route('categoria.show', $movimento->categoria_id) }}">{{ ucwords($movimento->categoria->nome) }}</a></td>
                    <td><a href="{{ route('associado.show', $movimento->conta->titular) }}">{{ ucwords($movimento->conta->oTitular->nome) }}</a></td>
                    <td><a href="{{ route('avalista.show', $movimento->conta->avalista_id) }}">{{ ucwords($movimento->conta->avalista->nome) }}</a></td>
                    {{-- <td>
                      <a href="javascript:void(0);" class="btn btn-info">Ver</a>
                      <a href="{{ route('movimento.edit', $movimento->id) }}" class="btn btn-primary btn-round">Editar</a>
                      <a href="javascript:void(0);" class="btn btn-danger">Remover</a>
                    </td> --}}
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Não foram feitos movimentos ainda.</td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
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
