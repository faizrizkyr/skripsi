<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/bahanbaku*') ? 'active' : '' }}" href="/dashboard/bahanbaku">
            <span data-feather="file-text"></span>
            Data Bahan Baku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/sparepart*') ? 'active' : '' }}" href="/dashboard/sparepart">
            <span data-feather="file-text"></span>
            Data Sparepart
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
            <span data-feather="file-text"></span>
            Kategori Sparepart
          </a>
        </li>
      </ul>

    </div>
  </nav>