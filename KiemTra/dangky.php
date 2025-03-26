<?php
session_start();


if (isset($_GET['success']) && $_GET['success'] == 1) {
    include './views/dangky/success.php';
    exit;
}

require_once './config/config.php';


if (!isset($_SESSION['MaSV'])) {
    header("Location: login.php");
    exit;
}


if (isset($_GET['add'])) {
    $mahp = $_GET['add'];
    $maSV = $_SESSION['MaSV'];

    // Kiểm tra đã đăng ký chưa
    $check = $conn->query("
        SELECT 1 FROM dangky d
        JOIN chitietdangky c ON d.MaDK = c.MaDK
        WHERE d.MaSV = '$maSV' AND c.MaHP = '$mahp'
    ");

    if ($check->num_rows == 0) {
        // Chưa đăng ký => cho thêm vào giỏ
        $_SESSION['cart'][$mahp] = true;
    } else {
        // Đã đăng ký => không cho thêm, hoặc có thể thông báo
        $_SESSION['error'] = "Bạn đã đăng ký học phần này!";
    }

    header("Location: dangky.php");
    exit;
}



if (isset($_GET['remove'])) {
    $mahp = $_GET['remove'];
    unset($_SESSION['cart'][$mahp]);
}


if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
}


if (isset($_GET['save'])) {
    $maSV = $_SESSION['MaSV'];

    $sv = $conn->query("SELECT * FROM SinhVien WHERE MaSV = '$maSV'")->fetch_assoc();
    $cart = $_SESSION['cart'];

    $keys = "'" . implode("','", array_keys($cart)) . "'";
    $result = $conn->query("SELECT * FROM HocPhan WHERE MaHP IN ($keys)");
    $hocphans = [];
    while ($row = $result->fetch_assoc()) {
        $hocphans[] = $row;
    }

    include './views/dangky/confirm.php';
    exit;
}


if (isset($_GET['confirm'])) {
    $maSV = $_SESSION['MaSV'];

    $conn->query("INSERT INTO dangky (MaSV, NgayDK) VALUES ('$maSV', NOW())");
    $maDK = $conn->insert_id;

    foreach ($_SESSION['cart'] as $maHP => $val) {
        $conn->query("INSERT INTO chitietdangky (MaDK, MaHP) VALUES ('$maDK', '$maHP')");
        $conn->query("UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP = '$maHP'");
    }
    

    unset($_SESSION['cart']);
    header("Location: dangky.php?success=1");
    exit;
}


$cart = $_SESSION['cart'] ?? [];
$data = [];

if (!empty($cart)) {
    $keys = "'" . implode("','", array_keys($cart)) . "'";
    $result = $conn->query("SELECT * FROM HocPhan WHERE MaHP IN ($keys)");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>
<?php include './views/layout.php'; ?>

<div class="container mt-4">
    <h2>Đăng Kí Học Phần</h2>
    <table class="table">
        <thead>
            <tr>
                <th>MaHP</th>
                <th>Tên Học Phần</th>
                <th>Số Chỉ Chỉ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tongTC = 0;
            foreach ($data as $hp): ?>
                <tr>
                    <td><?= $hp['MaHP'] ?></td>
                    <td><?= $hp['TenHP'] ?></td>
                    <td><?= $hp['SoTinChi'] ?></td>
                    <td><a href="?remove=<?= $hp['MaHP'] ?>">Xóa</a></td>
                </tr>
                <?php $tongTC += $hp['SoTinChi']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><strong>Số học phần:</strong> <?= count($data) ?></p>
    <p><strong>Tổng số tín chỉ:</strong> <?= $tongTC ?></p>
    <a href="?clear=1" class="btn btn-danger">Xóa Đăng Kí</a>
    <a href="?save=1" class="btn btn-success">Lưu đăng ký</a>
</div>
