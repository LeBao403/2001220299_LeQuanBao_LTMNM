<?php 
    function calculateGrade($score) {
        if ($score >= 9) {
            return 'Xuất sắc';
        } elseif ($score >= 8) {
            return 'Giỏi';
        } elseif ($score >= 7) {
            return 'Khá';
        } elseif ($score >= 5) {
            return 'Trung bình';
        } else {
            return 'Yếu';
        }
    }
?>

<html>
    <head>
        <title>Chương trình đánh giá điểm số</title>
    </head>
    <body>
        <h1>Đánh giá điểm số</h1>
        <form method="POST">
            <p>Nhập điểm số: </p>
            <input type="number" name="score" required>
            <input type="submit" value="Đánh giá">
        </form>

        <?php
            if (isset($_POST['score'])) {
                $score = $_POST['score'];  
                echo "Xếp loại của bạn: " . calculateGrade($score);
            }
        ?>
    </body>
</html>
