<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold py-3">Detail Transaksi</h4>

<p><strong>Tanggal:</strong> <?= $transaksi['tanggal'] ?></p>
<p><strong>Total:</strong> Rp<?= number_format($transaksi['total_harga']) ?></p>
<p><strong>Dibayar:</strong> Rp<?= number_format($transaksi['bayar']) ?></p>
<p><strong>Kembalian:</strong> Rp<?= number_format($transaksi['bayar'] - $transaksi['total_harga']) ?></p>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama Produk</th>
      <th>Jumlah</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detail as $d): ?>
      <tr>
        <td><?= esc($d['nama_produk']) ?></td>
        <td><?= $d['jumlah'] ?></td>
        <td>Rp<?= number_format($d['sub_total']) ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<a href="<?= base_url('riwayat') ?>" class="btn btn-secondary">Kembali</a>
<a href="<?= base_url('riwayat/cetak/' . $transaksi['id']) ?>" target="_blank" class="btn btn-success">
  <i class="fas fa-print"></i> Cetak Struk
</a>



<?= $this->endSection() ?>
