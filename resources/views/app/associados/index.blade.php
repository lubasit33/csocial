@extends('app.layouts.dashboard')

@section('title', 'Associados - CSocial')
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
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Todos os Associados</h4>
          <div class="text-right">
            <a href="{{ route('associado.create') }}" class="btn btn-success btn-round">Cadastrar Associado</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Género</th>
                <th>Residência</th>
                <th>Ações</th>
              </thead>
              <tbody>
                @forelse ($associados as $associado)
                <tr>
                    <td>{{ ucwords($associado->nome) }}</td>
                    <td>{{ $associado->dataNascimento() }}</td>
                    <td>{{ ucwords($associado->genero()) }}</td>
                    <td>{{ ucwords($associado->residencia) }}</td>
                    <td>
                      <a href="{{ route('associado.show', $associado->id) }}" class="btn btn-info btn-round">Ver</a>
                      <a href="{{ route('associado.edit', $associado->id) }}" class="btn btn-primary btn-round">Editar</a>
                      {{-- <a href="javascript:void(0);" class="btn btn-danger">Remover</a> --}}
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Não foram cadastrados associdos ainda.</td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header">
          <h4 class="card-title"> Table on Plain Background</h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Country
                </th>
                <th>
                  City
                </th>
                <th class="text-right">
                  Salary
                </th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Dakota Rice
                  </td>
                  <td>
                    Niger
                  </td>
                  <td>
                    Oud-Turnhout
                  </td>
                  <td class="text-right">
                    $36,738
                  </td>
                </tr>
                <tr>
                  <td>
                    Minerva Hooper
                  </td>
                  <td>
                    Curaçao
                  </td>
                  <td>
                    Sinaai-Waas
                  </td>
                  <td class="text-right">
                    $23,789
                  </td>
                </tr>
                <tr>
                  <td>
                    Sage Rodriguez
                  </td>
                  <td>
                    Netherlands
                  </td>
                  <td>
                    Baileux
                  </td>
                  <td class="text-right">
                    $56,142
                  </td>
                </tr>
                <tr>
                  <td>
                    Philip Chaney
                  </td>
                  <td>
                    Korea, South
                  </td>
                  <td>
                    Overland Park
                  </td>
                  <td class="text-right">
                    $38,735
                  </td>
                </tr>
                <tr>
                  <td>
                    Doris Greene
                  </td>
                  <td>
                    Malawi
                  </td>
                  <td>
                    Feldkirchen in Kärnten
                  </td>
                  <td class="text-right">
                    $63,542
                  </td>
                </tr>
                <tr>
                  <td>
                    Mason Porter
                  </td>
                  <td>
                    Chile
                  </td>
                  <td>
                    Gloucester
                  </td>
                  <td class="text-right">
                    $78,615
                  </td>
                </tr>
                <tr>
                  <td>
                    Jon Porter
                  </td>
                  <td>
                    Portugal
                  </td>
                  <td>
                    Gloucester
                  </td>
                  <td class="text-right">
                    $98,615
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> --}}
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
