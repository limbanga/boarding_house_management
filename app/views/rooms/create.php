<?php
$title = isset($room) ? "Chỉnh sửa phòng" : "Thêm phòng";

// Nội dung của trang
ob_start();
?>
<div class="container mt-5">
    <h2 class="text-center"><?= isset($room) ? "Chỉnh sửa phòng" : "Thêm phòng trọ" ?></h2>

    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form id="roomForm" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Tên phòng</label>
            <input type="text" class="form-control" name="name" required value="<?= $room['name'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Giá thuê (VNĐ)</label>
            <input type="number" class="form-control" name="price" required value="<?= $room['price'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Diện tích (m²)</label>
            <input type="number" class="form-control" name="area" required value="<?= $room['area'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Số người ở tối đa</label>
            <input type="number" class="form-control" name="max_people" required value="<?= $room['max_people'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Nội thất</label>
            <textarea class="form-control" name="furniture" rows="3"><?= $room['furniture'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
                <option value="">Chọn trạng thái</option>
                <option value="dang_thue" <?= isset($room['status']) && $room['status'] == 1 ? 'selected' : '' ?>>Đang thuê</option>
                <option value="trong" <?= isset($room['status']) && $room['status'] == 0 ? 'selected' : '' ?>>Trống</option>
                <option value="dang_sua" <?= isset($room['status']) && $room['status'] == 2 ? 'selected' : '' ?>>Đang sửa chữa</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Hình ảnh phòng</label>
            <input type="file" class="form-control" name="image">
            <?php if (!empty($room['image'])): ?>
                <img src="<?= $room['image'] ?>" alt="Hình ảnh phòng" class="img-fluid mt-2" width="200">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($room) ? "Lưu thay đổi" : "Thêm phòng" ?></button>
        <a href="/room/index" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>