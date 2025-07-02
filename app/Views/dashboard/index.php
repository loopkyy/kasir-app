<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-12 mb-4">
    <h3 class="fw-bold">Dashboard Kasir</h3>
    <p>Selamat datang di WARQ, Rizky!</p>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">Total Produk</h5>
        <h2 class="display-5 text-primary"><?= $jumlahProduk ?></h2>
        <p class="text-muted">Jumlah produk yang tersedia</p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">Total Transaksi</h5>
        <h2 class="display-5 text-success"><?= $totalTransaksi ?></h2>
        <p class="text-muted">Transaksi yang sudah dilakukan</p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title">Pendapatan Hari Ini</h5>
        <h2 class="display-5 text-warning">Rp<?= number_format($totalHariIni, 0, ',', '.') ?></h2>
        <p class="text-muted">Total pemasukan hari ini</p>
      </div>
    </div>
  </div>

  <?php if (count($produkHabis) > 0) : ?>
  <div class="col-12 mt-4">
    <div class="alert alert-danger">
      <h6><i class="bi bi-exclamation-triangle-fill"></i> Produk Habis Stok!</h6>
      <ul>
        <?php foreach ($produkHabis as $produk) : ?>
          <li><?= esc($produk['nama']) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
