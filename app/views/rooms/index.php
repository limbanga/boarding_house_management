<?php
$title = "Danh sách phòng trọ";

// Nội dung của trang
ob_start();
?>
    <h2>Danh sách phòng trọ</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên phòng</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Phòng 101</td>
                <td>2.500.000 VND</td>
                <td>Trống</td>
                <td>
                    <button class="btn btn-warning btn-sm">Sửa</button>
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/layout.php';
?>
