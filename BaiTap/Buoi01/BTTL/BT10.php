<?php
    $name;
    $email;
    $phone;

    if (isset($_POST['name'])){
        $name = $_POST['name'];
    } else {
        $name = '';
    }

    if (isset($_POST['email'])){
        $email = $_POST['email'];
    } else {
        $email = '';
    }

    if (isset($_POST['phone'])){
        $phone = $_POST['phone'];
    } else {
        $phone = '';
    }
?>


<html>
    <head>
        <title>BT10</title>
    </head>
    <body>
        <h1>Lưu thông tin khách hàng</h1>
        <form method = "post">
            <h2>Nhập tên khách hàng: </h2>
            <input type="text" name = "name" required>
            <br>
            <h2>Nhập email khách hàng: </h2>
            <input type="email" name = "email" required>
            <br>
            <h2>Nhập số điện thoại khách hàng: </h2>
            <input type="text" name = "phone" required>
            <br>
            <input type = "submit" value = "Lưu thông tin">
        </form>
    </body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<h2>Thông tin khách hàng đã lưu:</h2>";
            echo "Tên: " . htmlspecialchars($name) . "<br>";
            echo "Email: " . htmlspecialchars($email) . "<br>";
            echo "Số điện thoại: " . htmlspecialchars($phone) . "<br>";
        }
    ?>
</html>