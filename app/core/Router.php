<?php
require_once __DIR__ . "/../controllers/TenantController.php";
require_once __DIR__ . "/../controllers/RoomController.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : "tenant";
$action = isset($_GET['action']) ? $_GET['action'] : "index";




$tenantController = new TenantController();
$roomController = new RoomController();

if ($controller == "tenant") {
    if ($action == "index") {
        $tenantController->index();
    } elseif ($action == "store") {
        $tenantController->store();
    } elseif ($action == "delete") {
        $tenantController->delete();
    }
}

if ($controller == "room") {
    // Handle room controller
    if ($action == "index") {
        
        // Handle room index action
        $roomController->index();
    }
    if ($action == "store") {
        // Handle room store action
        # code...
    }
    # code...
}

