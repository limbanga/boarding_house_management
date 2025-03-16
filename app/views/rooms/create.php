<?php
$title = isset($room) ? "Chỉnh sửa phòng trọ" : "Thêm phòng trọ";

// Nội dung của trang
ob_start();
?>
<div class="container">
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

    <form id="roomForm" method="POST" enctype="multipart/form-data" class="col-md-8">
        <div class="row">
            <div class="mb-3 col-6">
                <label>Tên phòng (Số phòng)</label>
                <input type="text" class="form-control" name="name" required value="<?= $room['name'] ?? '' ?>" placeholder="VD: A101">
            </div>


            <div class="mb-3 col-3">
                <label>Diện tích (m²)</label>
                <input type="number" class="form-control" name="area" required value="<?= $room['area'] ?? '' ?>">
            </div>

            <div class="mb-3 col-3">
                <label>Khu trọ</label>
                <select class="form-control" name="dormitory_id" required>
                    <option value="">Chọn khu trọ</option>
                    <?php foreach ($dormitories as $dormitory): ?>
                        <option value="<?= $dormitory['id'] ?>" <?= isset($room['dormitory_id']) && $room['dormitory_id'] == $dormitory['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dormitory['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" name="image">
                <?php if (!empty($room['image'])): ?>
                    <img src="<?= $room['image'] ?>" alt="Hình ảnh phòng" class="img-fluid mt-2" width="200">
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($room) ? "Lưu thay đổi" : "Thêm phòng" ?></button>

    </form>

</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>