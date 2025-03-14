<?php
require_once __DIR__ . '/../models/Room.php';

class RoomController {
    public function index() {
        $roomModel = new Room();
        $rooms = $roomModel->getAllRooms();
        include __DIR__ . '/../views/rooms.php';
    }
}
?>
