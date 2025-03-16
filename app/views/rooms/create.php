<?php
$title = isset($room) ? "Chỉnh sửa phòng" : "Thêm phòng";

// Nội dung của trang
ob_start();
?>
<div class="container mt-5">
    <h2><?= isset($room) ? "Chỉnh sửa phòng" : "Thêm phòng trọ" ?></h2>

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

    <form id="roomForm" method="POST" enctype="multipart/form-data" class="col-md-6">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    Thông tin phòng
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                    Điều khoản khi thuê
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                    Các dịch vụ đi kèm
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">
                    Hình ảnh
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active py-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="row">
                    <div class="mb-3 col-12">
                        <label>Tên phòng</label>
                        <input type="text" class="form-control" name="name" required value="<?= $room['name'] ?? '' ?>">
                    </div>

                    <div class="mb-3 col-12">
                        <label>Địa chỉ phòng</label>
                        <input type="text" class="form-control" name="name" required value="<?= $room['name'] ?? '' ?>">
                    </div>

                    <div class="mb-3 col-3">
                        <label>Diện tích (m²)</label>
                        <input type="number" class="form-control" name="area" required value="<?= $room['area'] ?? '' ?>">
                    </div>

                    <div class="mb-3 col-12">
                        <label>Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_trong" value="trong" <?= isset($room['status']) && $room['status'] == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_trong">
                                Trống
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_dang_sua" value="dang_sua" <?= isset($room['status']) && $room['status'] == 2 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status_dang_sua">
                                Đang sửa chữa
                            </label>
                        </div>
                        <?php if (isset($room)): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status_dang_thue" value="dang_thue" <?= isset($room['status']) && $room['status'] == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="status_dang_thue">
                                    Đang thuê
                                </label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="row">
                    <div class="mb-3 col-3">
                        <label>Giá thuê (VNĐ)</label>
                        <input type="number" class="form-control" name="price" required value="<?= $room['price'] ?? '' ?>">
                    </div>
                    <div class="mb-3 col-3">
                        <label>Số người ở tối đa</label>
                        <input type="number" class="form-control" name="max_people" required value="<?= $room['max_people'] ?? '' ?>">
                    </div>

                    <div class="mb-3 col-3">
                        <label>Cho nuôi thú cưng</label>
                        <select class="form-control" name="pet_allowed" required>
                            <option value="1" <?= isset($room['pet_allowed']) && $room['pet_allowed'] == 1 ? 'selected' : '' ?>>Có</option>
                            <option value="0" <?= isset($room['pet_allowed']) && $room['pet_allowed'] == 0 ? 'selected' : '' ?>>Không</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label>Giờ mở cửa</label>
                        <input type="time" class="form-control" name="opening_time" required value="<?= $room['opening_time'] ?? '' ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label>Giờ đóng cửa</label>
                        <input type="time" class="form-control" name="closing_time" required value="<?= $room['closing_time'] ?? '' ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label>Thời gian thanh toán</label>
                        <input type="text" class="form-control" name="payment_time" required value="<?= $room['payment_time'] ?? '' ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label>Cần cọc</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="requires_deposit" id="requires_deposit" value="1" <?= isset($room['requires_deposit']) && $room['requires_deposit'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="requires_deposit">
                                Có
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-6">
                        <label>Tiền cọc (VNĐ)</label>
                        <input type="number" class="form-control" name="deposit" required value="<?= $room['deposit'] ?? '' ?>">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="row">
                    <h4>
                        Tạm để trống
                    </h4>
                </div>
            </div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                <div class="row">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="image">
                        <?php if (!empty($room['image'])): ?>
                            <img src="<?= $room['image'] ?>" alt="Hình ảnh phòng" class="img-fluid mt-2" width="200">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($room) ? "Lưu thay đổi" : "Thêm phòng" ?></button>
        <a href="/room/index" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>