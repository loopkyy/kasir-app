<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold py-3">Transaksi</h4>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger text-center"><?= session()->getFlashdata('error') ?></div>
<?php endif ?>

<form action="<?= base_url('transaksi/simpan') ?>" method="post">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($produk as $p): ?>
        <tr>
          <td>
            <?= esc($p['nama']) ?>
            <input type="hidden" name="produk_id[]" value="<?= $p['id'] ?>">
          </td>
          <td>Rp<?= number_format($p['harga']) ?></td>
          <td><?= $p['stok'] ?></td>
          <td>
            <input type="number" name="jumlah[]" class="form-control jumlah" min="0" max="<?= $p['stok'] ?>" value="0" data-stok="<?= $p['stok'] ?>">

          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
<div class="mb-3">
  <label class="form-label fw-bold">Total Harga</label>
  <div class="input-group">
    <span class="input-group-text">Rp</span>
    <input type="text" id="total_harga" class="form-control" readonly>
  </div>
</div>

<div class="mb-3">
  <label for="bayar" class="form-label fw-bold">Bayar</label>
  <div class="input-group">
    <span class="input-group-text">Rp</span>
    <input type="text" name="bayar" id="bayar" class="form-control" placeholder="Contoh: 90.000" required>
  </div>
</div>


  <button type="submit" class="btn btn-success">Proses Transaksi</button>
</form>
<script>
  function formatRupiah(angka) {
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  const jumlahInputs = document.querySelectorAll('.jumlah');
  const totalHargaInput = document.getElementById('total_harga');

  function hitungTotal() {
    let total = 0;
    jumlahInputs.forEach(input => {
      const jumlah = parseInt(input.value) || 0;
      const row = input.closest('tr');
      const harga = parseInt(row.children[1].textContent.replace(/[^\d]/g, ''));
      total += harga * jumlah;
    });

    totalHargaInput.value = formatRupiah(total);
  }

  jumlahInputs.forEach(input => {
    input.addEventListener('input', hitungTotal);
  });

  const bayarInput = document.getElementById('bayar');
  bayarInput.addEventListener('input', function () {
    let nilai = this.value.replace(/[^\d]/g, '');
    this.value = formatRupiah(nilai);
  });
</script>

<?= $this->endSection() ?>
