<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 pb-5">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/bahanbaku*') ? 'active' : '' }}" href="/admin/bahanbaku">
            <span data-feather="database"></span>
            Data Bahan Baku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/sparepart*') ? 'active' : '' }}" href="/admin/sparepart">
            <span data-feather="tool"></span>
            Data Sparepart
          </a>
        </li>
        @if(auth()->user()->role == 'superadmin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}" href="/admin/kategori">
            <span data-feather="layers"></span>
            Kategori Sparepart
          </a>
        </li>
        @endif
        @if(auth()->user()->role != 'pegawai')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/pemesanan*') ? 'active' : '' }}" href="/admin/pemesanan">
            <span data-feather="chevrons-left"></span>
            Data Pemesanan
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/pemakaian*') ? 'active' : '' }}" href="/admin/pemakaian">
            <span data-feather="chevrons-right"></span>
            Data Pemakaian
          </a>
        </li>
        @if(auth()->user()->role == 'superadmin' || auth()->user()->role == 'manager' )
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/transaksi*') ? 'active' : '' }}" href="/admin/transaksi">
            <span data-feather="file-text"></span>
            Data Transaksi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/eoq*') ? 'active' : '' }}" href="/admin/eoq">
            <span data-feather="file-text"></span>
            Perhitungan EOQ
          </a>
        </li>
        @endif
        @if(auth()->user()->role == 'superadmin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="/admin/user">
            <span data-feather="users"></span>
            Data User
          </a>
        </li>
        @endif
      </ul>

    </div>
  </nav>