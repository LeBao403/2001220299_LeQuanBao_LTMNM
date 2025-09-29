<?php
require_once "TodoManager.php";
$manager = new TodoManager("todos.json");
$todos = $manager->getTodos();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>To-do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2 class="mb-3">To-do List</h2>

    <!-- Form thêm công việc -->
    <form action="todo.php" method="POST" class="d-flex mb-3">
        <input type="text" name="task" class="form-control me-2" placeholder="Nhập công việc mới...">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

    <!-- Danh sách công việc -->
    <ul class="list-group">
        <?php foreach ($todos as $todo): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span style="<?= $todo['done'] ? 'text-decoration: line-through;' : '' ?>">
                    <?= htmlspecialchars($todo['task']) ?>
                </span>
                <div>
                    <a href="todo.php?toggle=<?= $todo['id'] ?>" class="btn btn-sm btn-success">
                        <?= $todo['done'] ? "Chưa xong" : "Hoàn thành" ?>
                    </a>
                    <a href="todo.php?delete=<?= $todo['id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
