@extends('app.layouts.dashboard')

@section('title', 'Avalista - CSocial')
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
    <div class="col-md-5">
      <div class="card card-user">
        <div class="image">
          <img src="{{ asset('assets/img/damir-bosnjak.jpg') }}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="{{ route('avalista.edit', $avalista->id) }}">
              <img class="avatar border-gray"
                src="{{ !empty($avalista->imagem) ? asset('upload/avalistaimagens/' . $avalista->imagem) : asset('upload/default-avatar.png') }}" alt="User Profile Picture">
              <h5 class="title">{{ ucwords($avalista->nome) }}</h5>
            </a>
            <p class="description">
                {{ $avalista->bi }}
            </p>
          </div>
          <p class="description text-center">
            {{ $avalista->local_trabalho }}
          </p>
        </div>
        <div class="card-footer">
          <hr>
          <div class="button-container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-6 ml-auto mr-auto">
                <h5>{{ $avalista->salario() }}<br><small>Salário</small></h5>
              </div>
              <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                <h5>{{ $avalista->dataInicioFuncoes() }}<br><small>Início de Funções</small></h5>
              </div>
              <div class="col-lg-4 mr-auto">
                <h5>{{ $avalista->contas->count() }}<br><small>Contas</small></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="card">
        <div class="card-header">
          <h4 class="card-title">Team Members</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled team-members">
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-md-7 col-7">
                  DJ Khaled
                  <br />
                  <span class="text-muted"><small>Offline</small></span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-md-7 col-7">
                  Creative Tim
                  <br />
                  <span class="text-success"><small>Available</small></span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-ms-7 col-7">
                  Flume
                  <br />
                  <span class="text-danger"><small>Busy</small></span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div> --}}
    </div>
    <div class="col-md-7">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Todas as Contas de {{ ucwords($avalista->nome) }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Número da Conta</th>
                    <th>Saldo da Conta</th>
                    <th>Data de Abertura</th>
                    <th>Titular</th>
                    {{-- <th>Ações</th> --}}
                  </thead>
                  <tbody>
                    @forelse ($avalista->contas as $conta)
                    <tr>
                        <td><a href="{{ route('conta.show', $conta->id) }}">{{ $conta->numero_conta }}</a></td>
                        <td>{{ $conta->saldo() }}</td>
                        <td>{{ $conta->dataAbertura() }}</td>
                        <td><a href="{{ route('associado.show', $conta->titular) }}">{{ ucwords($conta->oTitular->nome) }}</a></td>
                        {{-- <td>
                          <a href="javascript:void(0);" class="btn btn-info btn-round">Ver</a>
                          <a href="{{ route('conta.edit', $conta->id) }}" class="btn btn-primary btn-round">Editar</a>
                          <a href="javascript:void(0);" class="btn btn-danger">Remover</a>
                        </td> --}}
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ ucwords($avalista->nome) }} não tem contas ainda.</td>
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
