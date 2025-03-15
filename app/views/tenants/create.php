<?php
$title = "Thêm khách thuê";

ob_start();
?>

<div class="container">
    <h2>Thêm Khách Thuê Mới</h2>
    <form action="/tenant/store" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Khách Thuê</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="room_id" class="form-label">Phòng</label>
            <input type="text" class="form-control" id="room_id" name="room_id" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày Kết Thúc</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>

        <button type="submit" class="btn btn-primary">Thêm khách thuê</button>
        <a href="/tenant" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>
