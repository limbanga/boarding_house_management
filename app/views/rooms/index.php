<?php
$title = "Danh sách phòng trọ";

// Nội dung của trang
ob_start();
?>
<div class="container mt-5">
    <h2 class="text-center">Quản lý phòng trọ</h2>

    <a href="/room/create" class="btn btn-success mb-3">Thêm phòng mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên phòng</th>
                <th>Giá thuê</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= $room['id']; ?></td>
                    <td><?= $room['name']; ?></td>
                    <td><?= number_format($room['price']); ?> VND</td>
                    <td><?= $room['status'] == 1 ? 'Đang thuê' : 'Trống'; ?></td>
                    <td>
                        <a href="/room/update/?id=<?= $room['id']?>" class="btn btn-warning btn-edit">
                            Sửa
                        </a>
                        <form method="POST" action="/room/delete" class="d-inline">
                            <input type="hidden" name="id" value="<?= $room['id'] ?>">
                        <button type="submit" class="btn btn-danger">
                            Xóa
                        </button>
                        </form>
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
