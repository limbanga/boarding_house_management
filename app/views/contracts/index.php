<?php
$title = "Danh sách hợp đồng thuê";

// Nội dung của trang
ob_start();
?>
<div class="container">
    <a href="/contract/create" class="btn btn-primary mb-3">Thêm hợp đồng</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Phòng</th>
                <th>Người thuê</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Tiền cọc</th>
                <th>Tiền thuê</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract) : ?>
                <tr>
                    <td><?= $contract['id']; ?></td>
                    <td><?= $contract['room_id']; ?></td>
                    <td><?= $contract['tenant_id']; ?></td>
                    <td><?= date("d/m/Y", strtotime($contract['start_date'])); ?></td>
                    <td><?= date("d/m/Y", strtotime($contract['end_date'])); ?></td>
                    <td><?= number_format($contract['deposit']); ?> VND</td>
                    <td><?= number_format($contract['rent_price']); ?> VND</td>
                    <td>
                        <?php
                        switch ($contract['status']) {
                            case 'pending':
                                echo '<span class="badge bg-warning">Chờ duyệt</span>';
                                break;
                            case 'active':
                                echo '<span class="badge bg-success">Đang thuê</span>';
                                break;
                            case 'expired':
                                echo '<span class="badge bg-secondary">Hết hạn</span>';
                                break;
                            case 'terminated':
                                echo '<span class="badge bg-danger">Chấm dứt</span>';
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <a href="/contract/update?id=<?= $contract['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="/contract/delete?id=<?= $contract['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa hợp đồng này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>
