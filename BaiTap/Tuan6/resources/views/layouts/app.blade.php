<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Thêm các CSS khác nếu cần -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        table {
            background-color: white;
        }
        .badge {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Thêm Bootstrap JS và các dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
