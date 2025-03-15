<?php

class HomeController
{

    public function __construct() {}

    public function index()
    {
        include __DIR__ . '/../views/home/index.php';
    }
}
