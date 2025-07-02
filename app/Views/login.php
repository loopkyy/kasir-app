<?= $this->extend('layouts/blank') ?> <!-- Layout fullscreen login -->
<?= $this->section('title') ?>Login - WARQ<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="vh-100 d-flex justify-content-center align-items-center bg-light">
  <div class="card shadow-sm p-4" style="width: 350px;">
    <h3 class="text-center mb-4 fw-bold">Kasir Login</h3>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <form action="<?= base_url('login/authenticate') ?>" method="post" autocomplete="off">
      <div class="mb-3 position-relative">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required autofocus>
      </div>
      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <span id="togglePassword" style="position: absolute; top: 38px; right: 10px; cursor: pointer;">
          <i class="fa fa-eye"></i>
        </span>
      </div>
      <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <small class="text-muted d-block text-center mt-3">© 2025 WARQ</small>
  </div>
</div>

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    this.querySelector('i').classList.toggle('fa-eye');
    this.querySelector('i').classList.toggle('fa-eye-slash');
  });
</script>

<?= $this->endSection() ?>
