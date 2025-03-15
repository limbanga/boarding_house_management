<?php
$title = "Thêm phòng";

// Nội dung của trang
ob_start();
?>
<div class="container mt-5">
    <h2 class="text-center">Thêm phòng trọ</h2>

    <form id="roomForm" method="POST">
        <div class="mb-3">
            <label>Tên phòng</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label>Giá thuê</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="mb-3">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
                <option value="1">Đang thuê</option>
                <option value="0">Trống</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm phòng</button>
        <a href="room_list.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>
