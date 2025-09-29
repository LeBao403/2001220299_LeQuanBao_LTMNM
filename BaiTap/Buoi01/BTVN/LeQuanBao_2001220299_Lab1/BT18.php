<?php

    $sinhVienList = [];
    $maxSV = null;


    function timSVMax($ds) {
        if (empty($ds)) return null;

        $max = $ds[0];
        foreach ($ds as $sv) {
            if ($sv['diem'] > $max['diem']) {
                $max = $sv;
            }
        }
        return $max;
    }


    if (isset($_POST['hoten']) && isset($_POST['diem'])) {
        $hoten = trim($_POST['hoten']);
        $diem = (float) $_POST['diem'];

        // Lưu tạm trong session (để không mất dữ liệu khi load lại)
        session_start();
        if (!isset($_SESSION['sinhvien'])) {
            $_SESSION['sinhvien'] = [];
        }
        $_SESSION['sinhvien'][] = ['hoten' => $hoten, 'diem' => $diem];
        $sinhVienList = $_SESSION['sinhvien'];

        
        $maxSV = timSVMax($sinhVienList);
    } elseif (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['sinhvien'])) {
        $sinhVienList = $_SESSION['sinhvien'];
        $maxSV = timSVMax($sinhVienList);   
    }
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Quản lý sinh viên</title>
    </head>
    <body>
        <h2>Quản lý danh sách sinh viên</h2>
        <form method="post">
            Họ tên: <input type="text" name="hoten" required>
            Điểm: <input type="number" name="diem" step="0.1" required>
            <input type="submit" value="Thêm sinh viên">
        </form>

        <h3>Danh sách sinh viên:</h3>
        <ul>
            <?php foreach ($sinhVienList as $sv): ?>
                <li><?php echo $sv['hoten'] . " - Điểm: " . $sv['diem']; ?></li>
            <?php endforeach; ?>
        </ul>

        <?php if ($maxSV): ?>
            <h3>Sinh viên có điểm cao nhất:</h3>
            <p><?php echo $maxSV['hoten'] . " - Điểm: " . $maxSV['diem']; ?></p>
        <?php endif; ?>
    </body>
    </html>
