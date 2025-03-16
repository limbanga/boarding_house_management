<?php
$title = "Danh sách khu trọ";

// Nội dung của trang
ob_start();
?>
<div class="container">

    <a href="/dormitory/create" class="btn btn-primary mb-3">Thêm khu trọ</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Người quản lý</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dormitories as $dorm) : ?>
                <tr>
                    <td><?= $dorm['id']; ?></td>
                    <td><?= $dorm['name']; ?></td>
                    <td><?= $dorm['address']; ?></td>
                    <td><?= $dorm['owner_id']; ?></td>
                    <td><?= date("d/m/Y", strtotime($dorm['created_at'])); ?></td>
                    <td>
                        <a href="/dormitory/update?id=<?= $dorm['id']; ?>" class="btn btn-warning">Sửa</a>
                        <a href="/dormitory/delete?id=<?= $dorm['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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
