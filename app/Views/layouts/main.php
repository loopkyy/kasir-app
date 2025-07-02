<!DOCTYPE html>
<html lang="en" class="customizer-hide" dir="ltr" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template-no-customizer">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <title><?= $title ?? 'WARQ' ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/market.png') ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Sidebar -->
      <?= $this->include('layouts/sidebar') ?>
      <!-- /Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">

        <!-- Navbar -->
        <?= $this->include('layouts/navbar') ?>
        <!-- /Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
        <!-- /Content wrapper -->

      </div>
      <!-- /Layout page -->
    </div>
  </div>

  <!-- Core JS -->
   <script>
  // Format input bayar
  const bayarInput = document.getElementById('bayar');
  if (bayarInput) {
    bayarInput.addEventListener('input', function () {
      let value = this.value.replace(/\D/g, '');
      this.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';
    });
  }

  // Validasi jumlah barang tidak lebih dari stok dan tidak minus
  const jumlahInputs = document.querySelectorAll('.jumlah');
  jumlahInputs.forEach(input => {
    input.addEventListener('input', function () {
      let max = parseInt(this.dataset.stok);
      let val = parseInt(this.value);

      if (val > max) this.value = max;
      if (val < 0 || isNaN(val)) this.value = 0;
    });
  });
</script>

  <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
  <script src="<?= base_url('assets/js/main.js') ?>"></script>
  <script>
  document.querySelectorAll('.format-rupiah').forEach(input => {
    input.addEventListener('input', function () {
      let angka = this.value.replace(/\D/g, '');
      this.value = angka ? new Intl.NumberFormat('id-ID').format(angka) : '';
    });
  });
</script>

</body>
</html>
