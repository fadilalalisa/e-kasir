<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
      <div class="simplebar-height-auto-observer-wrapper">
        <div class="simplebar-height-auto-observer"></div>
      </div>
      <div class="simplebar-mask">
        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
          <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">

            <div class="simplebar-content" style="padding: 0px;">
              <a class="sidebar-brand" href="/">
                <img src="<?= base_url() ?>/img/favicon.png" alt="App logo" width="28" height="28">
                <span class="align-middle me-3">E-Kasir</span>
              </a>

              <ul class="sidebar-nav">
                <li class="sidebar-header">
                  Pages
                </li>

                <li class="sidebar-item <?= getUri() == 'dashboard' ? 'active' : (getUri() == '' ? 'active' : '') ?>">
                  <a class="sidebar-link" href="/">
                    <i data-feather="activity"></i> <span class="align-middle">Dashboards</span>
                  </a>
                </li>

                <li class="sidebar-item <?= getUri() == 'user' ? 'active' : (getUri() == 'produk' ? 'active' : '') ?>">
                  <a data-bs-target="#master-data" data-bs-toggle="collapse" class="sidebar-link <?= getUri() == 'user' ? '' : (getUri() == 'produk' ? '' : 'collapsed') ?>" aria-expanded='<?= getUri() == 'user' ? "true" : (getUri() == 'produk' ? "true" : "false") ?>'>
                    <i data-feather="database"></i> <span class="align-middle">Master Data</span>
                  </a>
                  <ul id="master-data" class="sidebar-dropdown list-unstyled collapse <?= getUri() == 'user' ? 'active' : (getUri() == 'produk' ? 'show' : '') ?>" data-bs-parent="#sidebar">
                    <?php if (auth('role') == 'superadmin') : ?>
                      <li class="sidebar-item <?= getUri() == 'user' ? 'active' : '' ?>"><a class="sidebar-link" href="#">User</a></li>
                    <?php endif ?>

                    <li class="sidebar-item <?= getUri() == 'produk' ? 'active' : '' ?>"><a class="sidebar-link" href="/produk">Produk</a></li>
                    <li class="sidebar-item <?= getUri() == 'supplier' ? 'active' : '' ?>"><a class="sidebar-link" href="/supplier">Supplier</a></li>
                  </ul>
                </li>

                <li class="sidebar-item <?= getUri() == 'user' ? 'active' : (getUri() == 'produk' ? 'active' : '') ?>">
                  <a data-bs-target="#transaksi" data-bs-toggle="collapse" class="sidebar-link <?= getUri() == 'user' ? '' : (getUri() == 'produk' ? '' : 'collapsed') ?>" aria-expanded='<?= getUri() == 'user' ? "true" : (getUri() == 'produk' ? "true" : "false") ?>'>
                    <i data-feather="clipboard"></i> <span class="align-middle">Transaksi</span>
                  </a>
                  <ul id="transaksi" class="sidebar-dropdown list-unstyled collapse <?= getUri() == 'user' ? 'active' : (getUri() == 'produk' ? 'show' : '') ?>" data-bs-parent="#sidebar">
                    <?php if (auth('role') == 'superadmin') : ?>
                      <li class="sidebar-item <?= getUri() == 'user' ? 'active' : '' ?>"><a class="sidebar-link" href="#">User</a></li>
                    <?php endif ?>
                    <li class="sidebar-item <?= getUri() == 'master-penjualan' ? 'active' : '' ?>"><a class="sidebar-link" href="/detailpenjualan">Penjualan</a></li>
                  </ul>
                </li>

                <li class="sidebar-item">
                  <a data-bs-target="#laporan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i data-feather="archive"></i> <span class="align-middle">Laporan</span>
                  </a>
                  <ul id="laporan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item <?= getUri() == 'laporan-penjualan' ? 'active' : '' ?>"><a class="sidebar-link" href="/penjualan">Penjualan</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
      <div class="simplebar-placeholder" style="width: auto; height: 1254px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
      <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
      <div class="simplebar-scrollbar" style="height: 464px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
    </div>
  </div>
</nav>