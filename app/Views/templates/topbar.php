<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <form class="d-none d-sm-inline-block">
    <div class="input-group input-group-navbar">
      <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
      <button class="btn" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </button>
    </div>
  </form>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
          <i data-feather="settings" class="align-middle"></i>
        </a>

        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
          <span class="text-dark"><?= auth('nama') ?> (<?= auth('role') ?>)</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="/logout">Sign out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>