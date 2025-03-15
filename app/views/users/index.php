<?php
$title = "Quản lý người dùng";
ob_start();
?>

<div class="container mt-5">
    <h2 class="text-center">Danh sách Người dùng</h2>
    <a href="create_user.php" class="btn btn-success mb-3"><i class="fas fa-user-plus"></i> Thêm người dùng</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= ucfirst($user['role']); ?></td>
                    <td>
                        <a href="delete_user.php?id=<?= $user['id']; ?>" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/index.php';
?>
