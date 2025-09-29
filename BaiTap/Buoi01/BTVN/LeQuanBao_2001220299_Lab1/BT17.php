<?php 
    $a = $_POST['a'];
    if (isset($_POST['a']))
        $ChuoiHoa = strtoupper($a);
?>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upper String</title>
</head>
<body>
    <h2>Viết hoa chuỗi</h2>
    <form method="post">
        Nhập chuỗi A: <input type="text" name="a" value="<?php echo $a; ?>" required>
        <input type="submit" value="Viết hoa chuỗi">
    </form>

    <?php
        if (!empty($a)){
            echo "<h3>Chuỗi A sau khi viết hoa là: " . $ChuoiHoa . "</h3>";
        }
        
    ?>
</body>
</html>