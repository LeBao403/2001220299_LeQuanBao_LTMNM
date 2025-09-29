
<?php
    $n;
    $tong = 0;

    if (isset($_POST['n'])) {
        $n = (int) $_POST['n'];
        if ((int)$_POST['n'] > 0){
            $tong = $n * ($n + 1) / 2;
        }
        
    }

?>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tổng 1 đến N</title>
</head>
<body>
    <h2>Bài tập 16: Tính tổng từ 1 đến N</h2>
    <form method="post">
        Nhập N: <input type="number" name="n" value="<?php echo $n; ?>" required>
        <input type="submit" value="Tính tổng">
    </form>

    <?php
    if ($tong > 0) {
        echo "<h3>Tổng từ 1 đến $n là: $tong</h3>";
    }
    ?>
</body>
</html>
