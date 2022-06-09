<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/bahanbaku*') ? 'active' : '' }}" href="/admin/bahanbaku">
            <span data-feather="file-text"></span>
            Data Bahan Baku
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/sparepart*') ? 'active' : '' }}" href="/admin/sparepart">
            <span data-feather="file-text"></span>
            Data Sparepart
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}" href="/admin/kategori">
            <span data-feather="file-text"></span>
            Kategori Sparepart
          </a>
        </li>
      </ul>

    </div>
  </nav>