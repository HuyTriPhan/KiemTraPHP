<?php $title = "Danh sách Sinh Viên"; ?>
<?php include('./views/layout.php'); ?>


<!DOCTYPE html>
<html>
<head>
    <title>Trang Sinh Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>TRANG SINH VIÊN</h2>
    <a href="?action=create">Add Student</a>
    <table class="table table-bordered mt-3">
        <thead class="thead-light">
        <tr>
            <th>MaSV</th>
            <th>HoTen</th>
            <th>GioiTinh</th>
            <th>NgaySinh</th>
            <th>Hinh</th>
            <th>MaNganh</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $students->fetch_assoc()): ?>
            <tr>
                <td><?= $row['MaSV'] ?></td>
                <td><?= $row['HoTen'] ?></td>
                <td><?= $row['GioiTinh'] ?></td>
                <td><?= $row['NgaySinh'] ?></td>
                <td><img src="<?= $row['Hinh'] ?>" width="120" /></td>
                <td><?= $row['MaNganh'] ?></td>
                <td>
                    <a href="?action=edit&id=<?= $row['MaSV'] ?>">Edit</a> |
                    <a href="?action=detail&id=<?= $row['MaSV'] ?>">Details</a> |
                    <a href="?action=delete&id=<?= $row['MaSV'] ?>" onclick="return confirm('Xoá?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
