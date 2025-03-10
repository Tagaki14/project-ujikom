<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item navbar-brand-mini-wrapper">
        <a class="nav-link navbar-brand brand-logo-mini" href="/dashboard"><img src="/vendor/stellar/assets/images/logo-mini.svg" alt="logo" /></a>
      </li>
      <li class="nav-item nav-profile">
        <a href="/profile" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('storage/profile/' . auth('admin')->user()->photo) }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ auth('admin')->user()->nama }}</p>
            <p class="designation">{{ auth('admin')->user()->level }}</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Dashboard</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <span class="menu-title">Dashboard</span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      <li class="nav-item nav-category"><span class="nav-link">Master Data</span></li>
      <li class="nav-item">
        <a class="nav-link" href="/user">
          <span class="menu-title">Data User</span>
          <i class="icon-user menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/kamar">
          <span class="menu-title">Data Kamar</span>
          <i class="icon-layers menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/fasilitaskamar">
          <span class="menu-title">Data Fasilitas Kamar</span>
          <i class="icon-list menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/fasilitashotel">
          <span class="menu-title">Data Fasilitas Hotel</span>
          <i class="icon-list menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pelanggan">
          <span class="menu-title">Data pelanggan</span>
          <i class="icon-people menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tamu">
          <span class="menu-title">Data Tamu</span>
          <i class="icon-people menu-icon"></i>
        </a>
      </li>

      <li class="nav-item nav-category"><span class="nav-link">Resepsionis</span></li>
      <li class="nav-item">
        <a class="nav-link" href="/reservasi">
          <span class="menu-title">Reservasi</span>
          <i class="icon-event menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/laporan">
          <span class="menu-title">Laporan</span>
          <i class="icon-folder menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
