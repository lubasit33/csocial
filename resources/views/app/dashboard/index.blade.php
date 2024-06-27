@extends('app.layouts.dashboard')

@section('dashboard', 'active')

@section('css')
<!--     Fonts and icons     -->
{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- CSS Files -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
<link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-body ">
            <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-globe text-warning"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                <p class="card-category">Categorias</p>
                <p class="card-title">{{ $categorias }}<p>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
            <i class="fa fa-refresh"></i>
            Update Now
            </div> --}}
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-body ">
            <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-money-coins text-success"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                <p class="card-category">Movimentos</p>
                <p class="card-title">AOA {{ $movimentos }}<p>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
            <i class="fa fa-calendar-o"></i>
            Last day
            </div> --}}
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-body ">
            <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-vector text-danger"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                <p class="card-category">Contas</p>
                <p class="card-title">{{ $contas }}<p>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
            <i class="fa fa-clock-o"></i>
            In the last hour
            </div> --}}
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <div class="card-body ">
            <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-favourite-28 text-primary"></i>
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                <p class="card-category">Avalistas</p>
                <p class="card-title">{{ $avalistas }}<p>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
            <i class="fa fa-refresh"></i>
            Update now
            </div> --}}
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Associados</h5>
          <p class="card-category">Análise de 24 horas</p>
        </div>
        <div class="card-body ">
          <canvas id=chartHours width="400" height="100"></canvas>
        </div>
        <div class="card-footer ">
          <hr>
          {{-- <div class="stats">
            <i class="fa fa-history"></i> Updated 3 minutes ago
          </div> --}}
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
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
@endsection