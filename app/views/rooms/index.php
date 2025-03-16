<?php
$title = "Danh sách phòng trọ";

// Nội dung của trang
ob_start();
?>
<div class="container">

    <a href="/room/create" class="btn btn-primary mb-3">Thêm phòng</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Diện tích</th>
                <th>Số người tối đa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?= $room['id']; ?></td>
                    <td><?= $room['name']; ?></td>
                    <td><?= number_format($room['price']); ?> VND</td>
                    <td>

                        <?php
                        switch ($room['status']) {
                            case 'dang_thue':
                                echo 'Đang thuê';
                                break;
                            case 'dang_sua':
                                echo 'Đang sửa chữa';
                                break;
                            default:
                                echo 'Trống';
                                break;
                        }
                        ?>

                    </td>
                    <td><?= $room['area']; ?> m²</td>
                    <td><?= $room['max_people']; ?></td>
                    <td>
                        <a href="/room/update?id=<?= $room['id']; ?>" class="btn btn-warning">Sửa</a>
                        <a href="index.php?controller=room&action=delete&id=<?= $room['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn?')">Xóa</a>
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