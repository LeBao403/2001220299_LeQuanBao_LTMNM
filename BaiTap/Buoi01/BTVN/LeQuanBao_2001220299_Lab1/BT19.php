<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 19</title>
</head>
<body>
    <h1>Nhập nội dung ghi chú</h1>
    <form method="post">
        <textarea name="note" rows="5" cols="40" required></textarea><br>
        <input type="submit" value="Lưu">
    </form>

    <h2>Nội dung đã lưu:</h2>
    <?php
    $filename = "note.txt";

    if (isset($_POST['note'])) {
        $note = trim($_POST['note']);
        if ($note !== '') {
            file_put_contents($filename, $note . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo nl2br(htmlspecialchars($content));
    } else {
        echo "<i>Chưa có ghi chú nào</i>";
    }
    ?>
</body>
</html>
