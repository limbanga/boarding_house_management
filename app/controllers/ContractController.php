<?php
require_once __DIR__ . '/../models/ContractModel.php';
require_once __DIR__ . '/../models/RoomModel.php';
require_once __DIR__ . '/../models/TenantModel.php';


class ContractController
{
    private $contractModel;
    private $tenantModel;
    private $roomModel;

    public function __construct()
    {
        $this->contractModel = new ContractModel();
        $this->tenantModel = new TenantModel();
        $this->roomModel = new RoomModel();
    }

    public function index()
    {
        $contracts = $this->contractModel->getAllContracts();
        include __DIR__ . '/../views/contracts/index.php';
    }

    public function create()
    {
        $tenants = $this->tenantModel->getAllTenants();
        $rooms = $this->roomModel->getAllRooms();
        include __DIR__ . '/../views/contracts/create.php';
    }

}