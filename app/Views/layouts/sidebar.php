<?php $uri = service('uri'); ?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?= base_url('/') ?>" class="app-brand-link">
      <span class="app-brand-logo demo">🛒</span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">WARQ</span>
    </a>
  </div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= $uri->getSegment(1) == '' ? 'active' : '' ?>">
      <a href="<?= base_url('/') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- Produk -->
    <li class="menu-item <?= $uri->getSegment(1) == 'produk' ? 'active' : '' ?>">
      <a href="<?= base_url('/produk') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-package"></i>
        <div>Produk</div>
      </a>
    </li>

    <!-- Transaksi -->
    <li class="menu-item <?= $uri->getSegment(1) == 'transaksi' ? 'active' : '' ?>">
      <a href="<?= base_url('/transaksi') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div>Transaksi</div>
      </a>
    </li>

    <!-- Riwayat -->
    <li class="menu-item <?= $uri->getSegment(1) == 'riwayat' ? 'active' : '' ?>">
      <a href="<?= base_url('riwayat') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div>Riwayat</div>
      </a>
    </li>
  </ul>
</aside>
