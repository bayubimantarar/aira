<div class="page-sidebar toggled sidebar">
  <nav class="sidebar-collapse d-none d-lg-block">
    <i class="ion ion-ios-arrow-forward show-on-collapsed"></i>
    <i class="ion ion-ios-arrow-back hide-on-collapsed"></i>
  </nav>

  <ul class="nav nav-pills nav-stacked" id="sidebar-stacked">
    <li class="d-lg-none">
      <a href="#" class="sidebar-close"><i class="ion ion-ios-arrow-left"></i></a>
    </li>
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
      <a class="nav-link" href="/"><i class="ion ion-ios-home"></i> <span class="nav-text">Dasbor</span></a>
    </li>
    <li class="nav-item {{ Request::is('pelanggan') ? 'active' : '' }}">
      <a class="nav-link" href="/pelanggan"><i class="ion ion-android-people"></i"></i> <span class="nav-text">Pelanggan</span></a>
    </li>
    <li class="nav-item {{ Request::is('penjualan') ? 'active' : '' }}">
      <a class="nav-link" href="/penjualan"><i class="ion ion-clipboard"></i"></i> <span class="nav-text">Penjualan</span></a>
    </li>
  </ul>
</div>
