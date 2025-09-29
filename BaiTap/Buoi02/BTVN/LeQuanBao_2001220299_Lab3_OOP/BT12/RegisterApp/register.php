<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($name === "" || $email === "" || $password === "" || $confirm === "") {
        die("Vui lòng nhập đầy đủ thông tin.");
    }

    if ($password !== $confirm) {
        die("Mật khẩu xác nhận không khớp.");
    }

    // Kiểm tra email trùng
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Email đã tồn tại, vui lòng dùng email khác.");
    }
    $stmt->close();

    // Mã hóa mật khẩu
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Lưu vào DB
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
