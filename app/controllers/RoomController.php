<?php
require_once __DIR__ . '/../models/RoomModel.php';

class RoomController {
    private $roomModel;

    public function __construct() {
        $this->roomModel = new RoomModel();
    }

    public function index() {
        $rooms = $this->roomModel->getAllRooms();
        include __DIR__ . '/../views/rooms/index.php';
    }

    public function create() {
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

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $this->roomModel->updateRoom($id, $name, $price, $status);
            echo json_encode(["success" => true]);
        }
        
        $id = $_GET['id'];
        $room = $this->roomModel->getRoomById($id);

        include __DIR__ . '/../views/rooms/create.php';
    }

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $this->roomModel->deleteRoom($id);
            header("Location: /room");
        }
    }
}
?>
