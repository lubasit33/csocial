@extends('app.layouts.dashboard')

@section('title', 'Meu Perfil - CSocial')

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
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="{{ asset('assets/img/damir-bosnjak.jpg') }}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="{{ asset('assets/img/default-avatar.png') }}" alt="User Profile Picture">
              <h5 class="title">{{ ucwords($user->name) }}</h5>
            </a>
            <p class="description">
              {{ $user->email }}
            </p>
          </div>
          {{-- <p class="description text-center">
            "I like the way you work it <br>
            No diggity <br>
            I wanna bag it up"
          </p> --}}
        </div>
        <div class="card-footer">
          <hr>
          {{-- <div class="button-container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-6 ml-auto">
                <h5>12<br><small>Files</small></h5>
              </div>
              <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                <h5>2GB<br><small>Used</small></h5>
              </div>
              <div class="col-lg-3 mr-auto">
                <h5>24,6$<br><small>Spent</small></h5>
              </div>
            </div>
          </div> --}}
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
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Editar Meu Perfil</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Company (disabled)</label>
                  <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" value="michael23">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" placeholder="Email">
                </div>
              </div>
            </div> --}}
            {{-- <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" placeholder="Company" value="Chet">
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                </div>
              </div>
            </div> --}}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome de Usuário</label>
                  <input type="text" class="form-control" placeholder="Digite o seu nome de usuário" name="name" value="{{ old('name', $user->name) }}" />
                    @error('name')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="Digite o seu email" name="email" value="{{ old('email', $user->email) }}" />
                    @error('email')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
              </div>
            </div>
            {{-- <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="City" value="Melbourne">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" placeholder="Country" value="Australia">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label>Postal Code</label>
                  <input type="number" class="form-control" placeholder="ZIP Code">
                </div>
              </div>
            </div> --}}
            {{-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                </div>
              </div>
            </div> --}}
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Actualizar Meu Perfil</button>
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
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/demo.js') }}"></script>

<script>
    @if (session('success'))
        demo.showNotification('success', 'nc-icon nc-check-2', "{{ session('success') }}", 10, 'top', 'right')
    @endif
</script>
@endsection
