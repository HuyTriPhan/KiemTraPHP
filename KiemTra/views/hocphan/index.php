<?php include './views/layout.php'; ?>

<div class="container mt-4">
    <h2>DANH SÁCH HỌC PHẦN</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['MaHP'] ?></td>
                <td><?= $row['TenHP'] ?></td>
                <td><?= $row['SoTinChi'] ?></td>
                <td><a href="dangky.php?add=<?= $row['MaHP'] ?>" class="btn btn-success">Đăng Kí</a></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
