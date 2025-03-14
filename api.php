<?php
require_once 'app/controllers/RoomController.php';

$roomController = new RoomController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            $roomController->addRoom();
            break;
        case 'update':
            $roomController->updateRoom();
            break;
        case 'delete':
            $roomController->deleteRoom();
            break;
    }
}
?>
