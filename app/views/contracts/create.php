<?php
$title = "Thêm hợp đồng thuê";

// Nội dung của trang
ob_start();
?>
<div class="container">
    <h2 class="mb-4">Thêm hợp đồng thuê</h2>

    <form action="/contract/store" method="POST">
        <div class="mb-3">
            <label for="room_id" class="form-label">Chọn phòng</label>
            <select class="form-select" id="room_id" name="room_id" required>
                <option value="">-- Chọn phòng --</option>
                <?php foreach ($rooms as $room) : ?>
                    <option value="<?= $room['id']; ?>"><?= $room['name']; ?> - <?= number_format($room['price']); ?> VND</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tenant_id" class="form-label">Chọn người thuê</label>
            <select class="form-select" id="tenant_id" name="tenant_id" required>
                <option value="">-- Chọn người thuê --</option>
                <?php foreach ($tenants as $tenant) : ?>
                    <option value="<?= $tenant['id']; ?>"><?= $tenant['name']; ?> (<?= $tenant['phone']; ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <div class="mb-3">
            <label for="deposit" class="form-label">Tiền cọc (VND)</label>
            <input type="number" class="form-control" id="deposit" name="deposit" required>
        </div>

        <div class="mb-3">
            <label for="rent_price" class="form-label">Tiền thuê (VND)</label>
            <input type="number" class="form-control" id="rent_price" name="rent_price" required>
        </div>

        <div class="mb-3">
            <label for="payment_cycle" class="form-label">Chu kỳ thanh toán</label>
            <select class="form-select" id="payment_cycle" name="payment_cycle">
                <option value="monthly">Hàng tháng</option>
                <option value="quarterly">Hàng quý</option>
                <option value="half_yearly">Hàng 6 tháng</option>
                <option value="yearly">Hàng năm</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_day" class="form-label">Ngày thanh toán</label>
            <input type="number" class="form-control" id="payment_day" name="payment_day" value="1" min="1" max="31">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái hợp đồng</label>
            <select class="form-select" id="status" name="status">
                <option value="pending">Chờ duyệt</option>
                <option value="active">Đang thuê</option>
                <option value="expired">Hết hạn</option>
                <option value="terminated">Chấm dứt</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu hợp đồng</button>
        <a href="/contract/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>
