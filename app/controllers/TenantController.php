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

    // public function store() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $name = $_POST['name'];
    //         $phone = $_POST['phone'];
    //         $email = $_POST['email'];

    //         $tenantModel = new Tenant();
    //         if ($tenantModel->create($name, $phone, $email)) {
    //             http_response_code(200);
    //         } else {
    //             http_response_code(500);
    //         }
    //     }
    // }

    public function delete() {
        if (isset($_GET["id"])) {
            $this->tenantModel->deleteTenant($_GET["id"]);
            header("Location: index.php?controller=tenant&action=index");
        }
    }
}
?>
