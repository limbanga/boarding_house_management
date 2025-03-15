<?php
require_once __DIR__ . '/../models/RoomModel.php';

class RoomController
{
    private $roomModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
    }

    public function index()
    {
        $rooms = $this->roomModel->getAllRooms();
        include __DIR__ . '/../views/rooms/index.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->roomModel->addRoom([
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'status' => $_POST['status']
            ]);
            header("Location: /room");
        }
        include __DIR__ . '/../views/rooms/create.php';
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_GET['id'];
            $name = trim($_POST['name']);
            $price = $_POST['price'];
            $area = $_POST['area'];
            $max_people = $_POST['max_people'];
            $furniture = trim($_POST['furniture']);
            $status = $_POST['status'];
            $errors = [];

            // 🛠 Kiểm tra dữ liệu nhập vào
            if (empty($name)) {
                $errors[] = "Tên phòng không được để trống.";
            } elseif (strlen($name) > 50) {
                $errors[] = "Tên phòng không được vượt quá 50 ký tự.";
            }

            if (!is_numeric($price) || $price <= 0) {
                $errors[] = "Giá thuê phải là số dương.";
            }

            if (!is_numeric($area) || $area <= 0) {
                $errors[] = "Diện tích phải là số dương.";
            }

            if (!is_numeric($max_people) || $max_people <= 0) {
                $errors[] = "Số người ở tối đa phải là số nguyên dương.";
            }

            // if (!in_array($status, [0, 1, 2])) {
            //     $errors[] = "Trạng thái không hợp lệ.";
            // }

            // 🛠 Kiểm tra file ảnh (nếu có tải lên)
            if (!empty($_FILES['image']['name'])) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (!in_array($fileExtension, $allowedExtensions)) {
                    $errors[] = "Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF.";
                }

                if ($_FILES['image']['size'] > 2 * 1024 * 1024) { // 2MB
                    $errors[] = "Kích thước ảnh không được vượt quá 2MB.";
                }
            }

            // Nếu có lỗi, hiển thị thông báo
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $room = [
                    'name' => $name,
                    'price' => $price,
                    'area' => $area,
                    'max_people' => $max_people,
                    'furniture' => $furniture,
                    'status' => $status
                ];
                include __DIR__ . '/../views/rooms/create.php';
                exit;
            }

            // 🛠 Xử lý ảnh nếu có tải lên
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "uploads/";
                $imageName = time() . "_" . basename($_FILES["image"]["name"]);
                $targetFilePath = $targetDir . $imageName;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    $image = $targetFilePath;
                } else {
                    $image = $_POST['existing_image'] ?? null;
                }
            } else {
                $image = $_POST['existing_image'] ?? null;
            }

            // 🛠 Cập nhật dữ liệu
            $this->roomModel->updateRoom(
                $id,
                [
                    'name' => $name,
                    'price' => $price,
                    'area' => $area,
                    'max_people' => $max_people,
                    'furniture' => $furniture,
                    'status' => $status,
                    'image' => $image
                ]
            );

            $_SESSION['success'] = "Cập nhật phòng thành công!";
            header("Location: /room/index");
            exit;
        }

        // Lấy thông tin phòng từ DB
        $id = $_GET['id'];
        $room = $this->roomModel->getRoomById($id);

        include __DIR__ . '/../views/rooms/create.php';
    }



    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $this->roomModel->deleteRoom($id);
            header("Location: /room");
        }
    }
}
