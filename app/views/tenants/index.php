<?php
$title = "Danh sách phòng trọ";

// Nội dung của trang
ob_start();
?>


<div class="container">
    <h2>Danh sách khách thuê</h2>
    <a href="views/tenants/create.php" class="btn btn-primary">Thêm khách thuê</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Phòng</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($tenants as $tenant): ?>
            <tr>
                <td><?= $tenant['id'] ?></td>
                <td><?= $tenant['name'] ?></td>
                <td><?= $tenant['phone'] ?></td>
                <td><?= $tenant['email'] ?></td>
                <td><?= $tenant['room_id'] ?></td>
                <td>
                    <a href="index.php?controller=tenant&action=delete&id=<?= $tenant['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>


