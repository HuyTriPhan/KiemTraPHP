<?php include './views/layout.php'; ?>
<div class="container mt-4">
    <h4>Thông tin Đăng kí</h4>
    <p><strong>Mã sinh viên:</strong> <?= $sv['MaSV'] ?></p>
    <p><strong>Họ tên:</strong> <?= $sv['HoTen'] ?></p>
    <p><strong>Ngày sinh:</strong> <?= $sv['NgaySinh'] ?></p>
    <p><strong>Ngành:</strong> <?= $sv['MaNganh'] ?></p>
    <p><strong>Ngày đăng ký:</strong> <?= date("d/m/Y") ?></p>

    <h5>Học phần đã chọn:</h5>
    <table class="table">
        <tr><th>MãHP</th><th>Tên</th><th>Tín chỉ</th></tr>
        <?php 
        $tongTC = 0;
        foreach ($hocphans as $hp): 
            $tongTC += $hp['SoTinChi'];
        ?>
            <tr>
                <td><?= $hp['MaHP'] ?></td>
                <td><?= $hp['TenHP'] ?></td>
                <td><?= $hp['SoTinChi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><strong>Số học phần:</strong> <?= count($hocphans) ?></p>
    <p><strong>Tổng số tín chỉ:</strong> <?= $tongTC ?></p>

    <a href="dangky.php?confirm=1" class="btn btn-success">Xác nhận</a>
</div>
