<?php include './views/layout.php'; ?>

<div class="container mt-4">
    <h2>DANH SÁCH HỌC PHẦN</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Số lượng dự kiến</th>
            <th></th> <!-- Nút hành động -->
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['MaHP'] ?></td>
                <td><?= $row['TenHP'] ?></td>
                <td><?= $row['SoTinChi'] ?></td>
                <td><?= $row['SoLuong'] ?></td>
                <td>
                    <?php if ($row['SoLuong'] > 0): ?>
                        <a href="dangky.php?add=<?= $row['MaHP'] ?>" class="btn btn-success">Đăng Kí</a>
                    <?php else: ?>
                        <span class="text-danger">Hết chỗ</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
