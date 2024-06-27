<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="{{ route('user.profile', Auth::user()->id) }}" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{ asset('assets/img/default-avatar.png') }}">
        </div>
        <!-- <p>CT</p> -->
      </a>
      <a href="{{ route('user.profile', Auth::user()->id) }}" class="simple-text logo-normal">
        {{ Auth::user()->name }}
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="@yield('dashboard')">
          <a href="{{ route('dashboard') }}">
            <i class="nc-icon nc-bank"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="@yield('associado')">
            <a href="{{ route('associado.index') }}">
                <i class="nc-icon nc-single-02"></i>
                <p>Associados</p>
            </a>
        </li>
        <li class="@yield('conta')">
            <a href="{{ route('conta.index') }}">
              <i class="nc-icon nc-diamond"></i>
              <p>Contas</p>
            </a>
          </li>
        <li class="@yield('avalista')">
            <a href="{{ route('avalista.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>Avalistas</p>
            </a>
        </li>
        <li class="@yield('movimento')">
          <a href="{{ route('movimento.index') }}">
            <i class="nc-icon nc-tile-56"></i>
            <p>Movimentos</p>
          </a>
        </li>
        <li class="@yield('categoria')">
            <a href="{{ route('categoria.index') }}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Categorias</p>
            </a>
          </li>
        {{-- <li>
          <a href="./typography.html">
            <i class="nc-icon nc-caps-small"></i>
            <p>Typography</p>
          </a>
        </li> --}}
        {{-- <li class="active-pro">
          <a href="./upgrade.html">
            <i class="nc-icon nc-spaceship"></i>
            <p>Upgrade to PRO</p>
          </a>
        </li> --}}
      </ul>
    </div>
  </div>
