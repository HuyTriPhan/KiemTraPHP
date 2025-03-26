<?php $title = ">Thêm Sinh Viên"; ?>
<?php include('./views/layout.php'); ?>

<html>
<head>
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>THÊM SINH VIÊN</h3>
    <form action="?action=store" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>MaSV</label>
            <input type="text" name="MaSV" class="form-control" required>
        </div>
        <div class="form-group">
            <label>HoTen</label>
            <input type="text" name="HoTen" class="form-control" required>
        </div>
        <div class="form-group">
            <label>GioiTinh</label>
            <input type="text" name="GioiTinh" class="form-control">
        </div>
        <div class="form-group">
            <label>NgaySinh</label>
            <input type="date" name="NgaySinh" class="form-control">
        </div>
        <div class="form-group">
            <label>Hình</label>
            <input type="file" name="Hinh" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label>MaNganh</label>
            <select name="MaNganh" class="form-control" required>
                <option value="">-- Chọn ngành --</option>
                <?php while ($nganh = $nganh_result->fetch_assoc()): ?>
                    <option value="<?= $nganh['MaNganh'] ?>"><?= $nganh['TenNganh'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </form>
</div>
</body>
</html>
