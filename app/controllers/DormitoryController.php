<?php
require_once __DIR__ . '/../models/DormitoryModel.php';

class DormitoryController
{
    private $dormitoryModel;

    public function __construct()
    {
        $this->dormitoryModel = new DormitoryModel();
    }

    public function index()
    {
        $dormitories = $this->dormitoryModel->getAllDormitories();
        include __DIR__ . '/../views/dormitories/index.php';
    }

}
