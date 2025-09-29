<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

  <h2 class="mb-4">Form đăng ký</h2>

  <form id="registerForm" action="register.php" method="POST" class="w-50">
    <div class="mb-3">
      <label for="name" class="form-label">Họ tên</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Mật khẩu</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
      <label for="confirm" class="form-label">Xác nhận mật khẩu</label>
      <input type="password" id="confirm" name="confirm" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Đăng ký</button>
  </form>

  <script>
    document.getElementById("registerForm").addEventListener("submit", function (e) {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let password = document.getElementById("password").value;
      let confirm = document.getElementById("confirm").value;

      if (name === "" || email === "" || password === "" || confirm === "") {
        alert("Vui lòng nhập đầy đủ thông tin!");
        e.preventDefault();
        return;
      }

      let emailRegex = /^[^@]+@[^@]+\.[^@]+$/;
      if (!emailRegex.test(email)) {
        alert("Email không hợp lệ!");
        e.preventDefault();
        return;
      }

      if (password.length < 6) {
        alert("Mật khẩu phải từ 6 ký tự!");
        e.preventDefault();
        return;
      }

      if (password !== confirm) {
        alert("Mật khẩu xác nhận không khớp!");
        e.preventDefault();
      }
    });
  </script>

</body>
</html>
