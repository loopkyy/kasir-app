<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold py-3">Edit Produk</h4>

<?php if (session()->getFlashdata('errors')): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form action="<?= base_url('produk/update/' . $produk['id']) ?>" method="post">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $produk['nama']) ?>" required>
  </div>

<div class="mb-3">
  <label for="harga" class="form-label">Harga</label>
  <input type="text" class="form-control format-rupiah" id="harga" name="harga" required
    value="<?= old('harga', isset($produk['harga']) ? number_format($produk['harga']) : '') ?>">
</div>


  <div class="mb-3">
    <label for="stok" class="form-label">Stok</label>
    <input type="number" class="form-control" id="stok" name="stok" value="<?= old('stok', $produk['stok']) ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
