<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tỷ giá ngoại tệ</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

  <h2 class="mb-3">Tỷ giá ngoại tệ</h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Loại tiền</th>
        <th>Tỷ giá (so với USD)</th>
      </tr>
    </thead>
    <tbody id="rates-table">
      <tr><td colspan="2" class="text-center">Đang tải...</td></tr>
    </tbody>
  </table>

  <script>
    async function loadRates() {
      try {
        const response = await fetch("rates.php");
        const data = await response.json();

        let rows = "";
        for (const [currency, rate] of Object.entries(data.rates)) {
          rows += `
            <tr>
              <td>${currency}</td>
              <td>${rate}</td>
            </tr>`;
        }

        document.getElementById("rates-table").innerHTML = rows;
      } catch (e) {
        document.getElementById("rates-table").innerHTML =
          `<tr><td colspan="2" class="text-danger">Lỗi tải dữ liệu</td></tr>`;
      }
    }

    // Gọi khi load trang
    loadRates();
    // Cập nhật mỗi 10 phút
    setInterval(loadRates, 600000);
  </script>

</body>
</html>
