@extends('app.layouts.dashboard')

@section('title', 'Avalistas - CSocial')
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
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Todos os Avalistas</h4>
          <div class="text-right">
            <a href="{{ route('avalista.create') }}" class="btn btn-success">Cadastrar Avalista</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Nome</th>
                <th>B.I.</th>
                <th>Data de Início de Funções</th>
                <th>Salário</th>
                <th>Local de Trabalho</th>
                <th>Ações</th>
              </thead>
              <tbody>
                @forelse ($avalistas as $avalista)
                <tr>
                    <td>{{ $avalista->nome }}</td>
                    <td>{{ $avalista->bi }}</td>
                    <td>{{ $avalista->dataInicioFuncoes() }}</td>
                    <td>{{ $avalista->salario() }}</td>
                    <td>{{ $avalista->local_trabalho }}</td>
                    <td>
                        <a href="{{ route('avalista.show', $avalista->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('avalista.edit', $avalista->id) }}" class="btn btn-primary">Editar</a>
                      {{-- <a href="javascript:void(0);" class="btn btn-danger">Remover</a> --}}
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Não foram cadastrados avalistas ainda.</td>
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
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  <script>
    @if (session('success'))
        demo.showNotification('success', 'nc-icon nc-check-2', "{{ session('success') }}", 10, 'top', 'right')
    @endif
</script>
@endsection
