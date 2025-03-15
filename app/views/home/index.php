<?php
$title = "Đăng nhập quản trị";

// Nội dung của trang
ob_start();
?>

<div class="container mt-5">
      <form action="/auth/login" method="POST" class="mt-4 col-md-4 mx-auto card card-body">
            <h2 class="text-center">Đăng nhập Quản Trị Viên</h2>

            <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                  <label for="password" class="form-label">Mật khẩu</label>
                  <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
      </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>