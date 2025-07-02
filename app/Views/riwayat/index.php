<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h4 class="fw-bold py-3">Riwayat Transaksi</h4>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transaksi as $index => $t): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $t['tanggal'] ?></td>
        <td>Rp<?= number_format($t['total_harga']) ?></td>
        <td>
          <a href="<?= base_url('riwayat/detail/' . $t['id']) ?>" class="btn btn-sm btn-info" title="Lihat">
            <i class="fas fa-eye"></i>
          </a>
          <button class="btn btn-sm btn-danger btn-delete" data-id="<?= $t['id'] ?>" title="Hapus">
            <i class="fas fa-trash-alt"></i>
          </button>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Konfirmasi hapus
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
      const id = this.getAttribute('data-id');
      Swal.fire({
        title: 'Hapus Transaksi?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '<?= base_url('riwayat/delete/') ?>' + id;
        }
      });
    });
  });

  // Flashdata success
  <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= session()->getFlashdata('success') ?>',
      showConfirmButton: false,
      timer: 2000
    });
  <?php endif ?>
</script>

<?= $this->endSection() ?>
