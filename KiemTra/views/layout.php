<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Quản lý Sinh viên' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Test1</a>
    <div class="navbar-nav">
        <a class="nav-link" href="index.php?action=index">Sinh Viên</a>
        <a class="nav-link" href="hocphan.php">Học Phần</a>
        <a class="nav-link" href="dangky.php">Đăng Kí (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</a>
        <a class="nav-link" href="dangnhap.php">Đăng Nhập</a>
    </div>
</nav>

<!-- Nội dung -->
<div class="container mt-4">

</div> <!-- end container -->
</body>
</html>