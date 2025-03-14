<?php
echo '<h1>Quản lý phòng trọ</h1>';

require_once 'app/controllers/RoomController.php';

$controller = new RoomController();
$controller->index();
