<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <title><?= $this->renderSection('title') ?? 'WARQ Kasir' ?></title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/market.png') ?>" />

  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Optional: FontAwesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <?= $this->renderSection('styles') ?>
</head>
<body>

  <?= $this->renderSection('content') ?>

  <!-- Bootstrap 5 JS Bundle CDN (Popper + Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?= $this->renderSection('scripts') ?>
</body>
</html>
