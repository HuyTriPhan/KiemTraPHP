<?php $title = "Chỉnh Sửa Sinh Viên"; ?>
<?php include('./views/layout.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh Sửa Sinh Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Hiệu chỉnh thông tin sinh viên</h3>
    <form action="?action=update&id=<?= $student['MaSV'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>HoTen</label>
            <input type="text" name="HoTen" value="<?= $student['HoTen'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>GioiTinh</label>
            <input type="text" name="GioiTinh" value="<?= $student['GioiTinh'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>NgaySinh</label>
            <input type="date" name="NgaySinh" value="<?= $student['NgaySinh'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Hình</label>
            <input type="file" name="Hinh" class="form-control-file">
            <input type="hidden" name="Hinh_cu" value="<?= $student['Hinh'] ?>">
            <br><img src="<?= $student['Hinh'] ?>" width="150">
        </div>
        <div class="form-group">
            <label>MaNganh</label>
            <input type="text" name="MaNganh" value="<?= $student['MaNganh'] ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </form>
</div>
</body>
</html>
