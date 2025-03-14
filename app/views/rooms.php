<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý phòng trọ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Quản lý phòng trọ</h2>

        <!-- Form thêm/sửa phòng -->
        <form id="roomForm">
            <input type="hidden" id="room_id">
            <div class="mb-3">
                <label>Tên phòng</label>
                <input type="text" class="form-control" id="room_name" required>
            </div>
            <div class="mb-3">
                <label>Giá thuê</label>
                <input type="number" class="form-control" id="room_price" required>
            </div>
            <div class="mb-3">
                <label>Trạng thái</label>
                <select class="form-control" id="room_status">
                    <option value="1">Đang thuê</option>
                    <option value="0">Trống</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

        <!-- Bảng danh sách phòng -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên phòng</th>
                    <th>Giá thuê</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="roomTable">
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?= $room['id']; ?></td>
                        <td><?= $room['name']; ?></td>
                        <td><?= number_format($room['price']); ?> VND</td>
                        <td><?= $room['status'] == 1 ? 'Đang thuê' : 'Trống'; ?></td>
                        <td>
                            <button class="btn btn-warning btn-edit" data-id="<?= $room['id']; ?>" data-name="<?= $room['name']; ?>" data-price="<?= $room['price']; ?>" data-status="<?= $room['status']; ?>">Sửa</button>
                            <button class="btn btn-danger btn-delete" data-id="<?= $room['id']; ?>">Xóa</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/room.js"></script>
</body>
</html>
