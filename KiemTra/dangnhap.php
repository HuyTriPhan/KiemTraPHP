<?php
session_start();
require_once './config/config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maSV = $_POST['MaSV'];

    $stmt = $conn->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
    $stmt->bind_param("s", $maSV);
    $stmt->execute();
    $result = $stmt->get_result();
    $sv = $result->fetch_assoc();

    if ($sv) {
        $_SESSION['MaSV'] = $sv['MaSV'];
        header("Location: dangky.php");
    } else {
        $error = "Mã sinh viên không tồn tại!";
    }
}
?>

<?php include './views/layout.php'; ?>
<div class="container mt-4">
    <h2>ĐĂNG NHẬP</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label>MaSV</label>
            <input type="text" name="MaSV" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    </form>
    <a href="index.php">Back to List</a>
</div>
