<?php
    function Dientich ($r){
        if ($r > 0) return pi() * $r * $r;
        else return "Bán kính không hợp lệ";
    }
?>

<html>
    <head>
        <title>Diện thích hình trong</title>
    </head>
    <body>
        <h1>ĐNhập vào bán kính hình tròn</h1>
        <form method="POST">
            <p>Nhập điểm số: </p>
            <input type="number" name="r" required>
            <input type="submit" value="Diện tích">
        </form>

        <?php
            if (isset($_POST['r'])) {
                $bk = $_POST['r'];  
                echo "Diện tích hình tròn: " . Dientich($bk);
            }
        ?>
    </body>
</html>