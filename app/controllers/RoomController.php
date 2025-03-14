<?php
require_once __DIR__ . '/../models/Room.php';

class RoomController {
    private $roomModel;

    public function __construct() {
        $this->roomModel = new Room();
    }

    public function index() {
        $rooms = $this->roomModel->getAllRooms();
        include __DIR__ . '/../views/rooms.php';
    }

    public function addRoom() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $this->roomModel->addRoom($name, $price, $status);
            echo json_encode(["success" => true]);
        }
    }

    public function updateRoom() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $this->roomModel->updateRoom($id, $name, $price, $status);
            echo json_encode(["success" => true]);
        }
    }

    public function deleteRoom() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $this->roomModel->deleteRoom($id);
            echo json_encode(["success" => true]);
        }
    }
}
?>
