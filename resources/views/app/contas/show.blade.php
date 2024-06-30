@extends('app.layouts.dashboard')

@section('title', 'Conta - CSocial')
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
    <div class="col-md-5">
      <div class="card card-user">
        <div class="image">
          <img src="{{ asset('assets/img/damir-bosnjak.jpg') }}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="{{ route('associado.edit', $conta->titular) }}">
              <img class="avatar border-gray" src="{{ asset('assets/img/default-avatar.png') }}" alt="User Profile Picture">
              <h5 class="title">{{ ucwords($conta->oTitular->nome) }}</h5>
            </a>
            {{-- <p class="description">

            </p> --}}
          </div>
          <p class="description text-center">
            {{ $conta->oTitular->residencia }}
          </p>
        </div>
        <div class="card-footer">
          <hr>
          <div class="button-container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-6 ml-auto mr-auto">
                <h5>{{ $conta->oTitular->idade() }}<br><small>Idade</small></h5>
              </div>
              <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                <h5>{{ ucwords($conta->oTitular->genero()) }}<br><small>Género</small></h5>
              </div>
              <div class="col-lg-4 mr-auto">
                <h5>{{ $conta->oTitular->contas->count() }}<br><small>Contas</small></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Avalista da Conta</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled team-members">
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-md-7 col-7">
                  {{ ucwords($conta->avalista->nome) }}
                  <br />
                  <span class="text-muted"><small>{{ ucwords($conta->avalista->local_trabalho) }}</small></span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <a href="{{ route('avalista.show', $conta->avalista_id) }}" class="btn btn-sm btn-outline-success btn-icon"><i class="fa fa-envelope"></i></a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Todas os Movimentos da Conta {{ $conta->numero_conta }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Tipo de Movimento</th>
                    {{-- <th>Ações</th> --}}
                  </thead>
                  <tbody>
                    @forelse ($conta->movimentos as $movimento)
                    <tr>
                        <td>{{ $movimento->valor }}</td>
                        <td>{{ $movimento->dataMovimento() }}</td>
                        <td><a href="{{ route('categoria.show', $movimento->categoria_id) }}">{{ ucwords($movimento->categoria->nome) }}</a></td>
                        {{-- <td>
                          <a href="javascript:void(0);" class="btn btn-info btn-round">Ver</a>
                          <a href="{{ route('movimento.edit', $movimento->id) }}" class="btn btn-primary btn-round">Editar</a>
                          <a href="javascript:void(0);" class="btn btn-danger">Remover</a>
                        </td> --}}
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"> Não tem movimentos ainda.</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
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
@endsection
