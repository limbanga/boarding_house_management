<?php
require_once __DIR__ . '/../models/TenantModel.php';

class TenantController {
    private $tenantModel;

    public function __construct() {
        $this->tenantModel = new Tenant();
    }

    public function index() {
        $tenants = $this->tenantModel->getAllTenants();
        include __DIR__ . '/../views/tenants/index.php';
    }

    public function create() {
        include __DIR__ . '/../views/tenants/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'room_id' => $_POST['room_id'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
            ];
            $this->tenantModel->createTenant($data);
            header('Location: /tenant/index');
        }
    }

    public function delete() {
        if (isset($_GET["id"])) {
            $this->tenantModel->deleteTenant($_GET["id"]);
            header("Location: /tenant/index");
        }
    }
}
?>
