<?php $title = "Chi tiết Sinh Viên"; ?>
<?php include('./views/layout.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết Sinh Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Thông tin chi tiết</h3>
    <p><strong>HoTen:</strong> <?= $student['HoTen'] ?></p>
    <p><strong>GioiTinh:</strong> <?= $student['GioiTinh'] ?></p>
    <p><strong>NgaySinh:</strong> <?= $student['NgaySinh'] ?></p>
    <p><strong>Hinh:</strong><br><img src="<?= $student['Hinh'] ?>" width="150"></p>
    <p><strong>MaNganh:</strong> <?= $student['MaNganh'] ?></p>
    <a href="?action=edit&id=<?= $student['MaSV'] ?>">Edit</a> |
    <a href="index.php">Back to List</a>
</div>
</body>
</html>
