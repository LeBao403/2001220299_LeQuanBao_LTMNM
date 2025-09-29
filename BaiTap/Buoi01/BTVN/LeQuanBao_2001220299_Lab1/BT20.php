<?php
if (isset($_POST['username'])) {
    $name = trim($_POST['username']);
    if ($name !== '') {
        setcookie("username", $name, time() + 86400, "/"); // Lưu 1 ngày
        header("Location: BT20.php");
        exit;
    }
}

// Nếu bấm nút Quên tên thì xóa cookie
if (isset($_GET['reset'])) {
    setcookie("username", "", time() - 3600, "/"); // Hết hạn
    header("Location: BT20.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ứng dụng Ghi nhớ tên</title>
</head>
<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <h2>Xin chào, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</h2>
        <p><a href="BT20.php?reset=1">Quên tôi đi</a></p>
    <?php else: ?>
        <h2>Nhập tên của bạn</h2>
        <form method="post">
            <input type="text" name="username" required>
            <input type="submit" value="Ghi nhớ">
        </form>
    <?php endif; ?>
</body>
</html>
