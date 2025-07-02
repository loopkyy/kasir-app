<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="#">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="<?= base_url('assets/img/avatars/profile.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
<ul class="dropdown-menu dropdown-menu-end">
  <li><a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="bx bx-log-out me-2"></i> Logout</a></li>
</ul>

        </ul>
      </li>
    </ul>
  </div>
</nav>
