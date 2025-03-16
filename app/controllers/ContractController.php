<?php
require_once __DIR__ . '/../models/ContractModel.php';

class ContractController
{
    private $contractModel;

    public function __construct()
    {
        $this->contractModel = new ContractModel();
    }

    public function index()
    {
        $contracts = $this->contractModel->getAllContracts();
        include __DIR__ . '/../views/contracts/index.php';
    }

}