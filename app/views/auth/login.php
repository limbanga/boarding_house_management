<?php
$title = "Đăng nhập";
ob_start();
?>

<div class="container mt-5">
  <div class="col-4 mx-auto card card-body">
    <h2 class="text-center">Đăng nhập</h2>
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger"><?= $error; ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label>Mật khẩu</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>