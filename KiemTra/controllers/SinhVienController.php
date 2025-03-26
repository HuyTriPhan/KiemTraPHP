<?php
require_once './models/SinhVien.php';
require_once './config/config.php';

$sv = new SinhVien($conn);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $students = $sv->all();
        include './views/sinhvien/index.php';
        break;
    case 'create':
        $nganh_result = $conn->query("SELECT * FROM NganhHoc");
        include './views/sinhvien/create.php';
        break;
    case 'store':
        $targetDir = "uploads/";
        $fileName = basename($_FILES["Hinh"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        
        if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
            $_POST['Hinh'] = $targetFilePath;
            $sv->store($_POST);
            header("Location: index.php");
        } else {
            echo "Tải ảnh thất bại.";
        }
        break;
        
    case 'edit':
        $student = $sv->find($id);
        include './views/sinhvien/edit.php';
        break;
    case 'update':
        if (!empty($_FILES["Hinh"]["name"])) {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["Hinh"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $targetFilePath)) {
                $_POST['Hinh'] = $targetFilePath;
            } else {
                $_POST['Hinh'] = $_POST['Hinh_cu']; // fallback
            }
        } else {
            $_POST['Hinh'] = $_POST['Hinh_cu'];
        }
        
        $sv->update($id, $_POST);
        header("Location: index.php");
        break;
        
    case 'delete':
        $sv->delete($id);
        header("Location: index.php");
        break;
    case 'detail':
        $student = $sv->find($id);
        include './views/sinhvien/detail.php';
        break;
}
