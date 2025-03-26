<?php
require_once './config/config.php';

class SinhVien {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function all() {
        return $this->conn->query("SELECT * FROM SinhVien");
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function store($data) {
        $stmt = $this->conn->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $data['MaSV'], $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $data['Hinh'], $data['MaNganh']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE SinhVien SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=?, MaNganh=? WHERE MaSV=?");
        $stmt->bind_param("ssssss", $data['HoTen'], $data['GioiTinh'], $data['NgaySinh'], $data['Hinh'], $data['MaNganh'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }
}
