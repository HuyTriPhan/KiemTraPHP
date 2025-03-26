<?php
require_once './config/config.php';

class HocPhanController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function index() {
        $result = $this->conn->query("SELECT * FROM HocPhan");
        include './views/hocphan/index.php';
    }
}

$controller = new HocPhanController($conn);
$controller->index();
