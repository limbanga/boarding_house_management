<?php
$title = "Danh sách khách thuê";

// Nội dung của trang
ob_start();
?>


<div class="container">
    <a href="/tenant/create" class="btn btn-primary">Thêm khách thuê</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Phone</th>
            <th>Email</th>
            <th>
                Mức độ rủi ro
            </th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($tenants as $tenant): ?>
            <tr>
                <td><?= $tenant['id'] ?></td>
                <td><?= $tenant['name'] ?></td>
                <td><?= $tenant['phone'] ?></td>
                <td><?= $tenant['email'] ?></td>
                <td>
                    <?php
                    switch (rand(1, 3)) {
                        case 1:
                            echo '<span class="badge bg-success">Thấp</span>';
                            break;
                        case 2:
                            echo '<span class="badge bg-warning">Trung bình</span>';
                            break;
                        case 3:
                            echo '<span class="badge bg-danger">Cao</span>';
                            break;
                    }
                    ?>
                </td>

                <td>
                    <a href="/tenant/delete&id=<?= $tenant['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                    <a href="#" class="btn btn-warning btn-sm">Chi tiết</a>
                    <a href="/tenant/history&id=<?= $tenant['id'] ?>" class="btn btn-info btn-sm">Lịch sử hành vi</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>