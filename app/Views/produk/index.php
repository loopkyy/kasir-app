<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- FLASH MESSAGE -->
<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success text-center mx-auto" style="max-width: 500px;">
    <?= session()->getFlashdata('success') ?>
  </div>
  <script>
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.style.display = 'none';
    }, 3000);
  </script>
<?php endif ?>

<!-- TOMBOL TAMBAH -->
<a href="<?= base_url('produk/create') ?>" class="btn btn-primary mb-3" title="Tambah Produk">
  <i class="fas fa-plus"></i>
</a>

<!-- TABEL PRODUK -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produk as $index => $p): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $p['nama'] ?></td>
        <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
        <td><?= $p['stok'] ?></td>
        <td>
          <a href="<?= base_url('produk/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
            <i class="fas fa-pen"></i>
          </a>
          <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= $p['id'] ?>" title="Hapus">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- SCRIPT SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.querySelectorAll('.btn-hapus').forEach(button => {
    button.addEventListener('click', function () {
      const id = this.getAttribute('data-id');
      Swal.fire({
        title: 'Yakin ingin menghapus produk ini?',
        text: 'Data yang dihapus tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `<?= base_url('produk/delete/') ?>${id}`;
        }
      });
    });
  });
</script>

<?= $this->endSection() ?>
