<?php
require_once __DIR__ . '/../models/Tenant.php';

class TenantController {
    private $tenantModel;

    public function __construct() {
        $this->tenantModel = new Tenant();
    }

    public function index() {
        $tenants = $this->tenantModel->getAll();
        include __DIR__ . '/../views/tenants/index.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $room_id = $_POST["room_id"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];

            $this->tenantModel->addTenant($name, $phone, $email, $room_id, $start_date, $end_date);
            header("Location: index.php?controller=tenant&action=index");
        }
    }

    public function delete() {
        if (isset($_GET["id"])) {
            $this->tenantModel->deleteTenant($_GET["id"]);
            header("Location: index.php?controller=tenant&action=index");
        }
    }
}
?>
