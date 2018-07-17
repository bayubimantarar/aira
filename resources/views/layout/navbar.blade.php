<nav class="navbar navbar-spark navbar-toggleable navbar-expand-md">
  <div class="container-fluid">
    <button type="button" class="sidebar-open d-lg-none">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand d-none d-lg-inline-block" href="/">
      <h1><b>PT. Aira Wisata Mandiri</b></h1>
    </a>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('pengguna')->user()->nama }}</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"><i class="ion ion-person"></i> Profil</a></li>
          <li><a class="dropdown-item" href="#"><i class="ion ion-gear-b"></i> Pengaturan</a></li>
          <li role="separator" class="dropdown-divider"></li>
          <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ion ion-log-out"></i> Keluar</a>
            <form id="logout-form" action="{{ route('autentikasi.logout')}}" method="post" style="display: none;">
                  {{ csrf_field() }}
              </form>
              </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <img src="{{ asset('/assets/img/avatar-500x500.png') }}" alt="Avatar" width="48" height="48" class="avatar img-circle" />
        </a>
      </li>
    </ul>
  </div>
</nav>
