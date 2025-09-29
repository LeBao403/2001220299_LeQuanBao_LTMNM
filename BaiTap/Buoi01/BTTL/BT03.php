


<?php 
    $bk;
    $chuvi = 0;
    $dientich = 0;

    if (isset($_POST['r'])){
        $bk = (float) $_POST['r'];
        $chuvi = 2 * pi() * $bk;
        $dientich = pi() * pow($bk, 2);
    }

?>

<html>
    <head>
        <title>Viết chương trình tính chu vi và diện tích hình tròn với bán kính nhập từ form GET.</title>
    </head>
    <body>
        <h1>Tính chu vi và diện tích hình tròn</h1>
        <form method = "POST">
            <p>Nhập bán kính hình tròn</p>
            <input type="number" name = "r" required>
            <input type= "submit" value = "Tính">
        </form>

        <?php 
            if (isset($_POST['r'])){
                echo "<h2>Bán kính hình tròn: $bk</h2>";
                echo "<h2>Chu vi hình tròn: $chuvi</h2>";
                echo "<h2>Diện tích hình tròn: $dientich</h2>";
            }
        ?>
    </body>
</html>