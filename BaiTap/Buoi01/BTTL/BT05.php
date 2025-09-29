<?php
    echo "<h1>BT05</h1>";
    echo "<h2>In bảng cửu chương 2 -> 9</h2>";

    for ($i = 2; $i <= 9; $i++){
        echo "<h3>Bảng cửu chương $i</h3>";
        for ($j = 1; $j <= 10; $j++){
            echo "$i x $j = " . ($i * $j) . "<br>";
        }
        echo "<br>";
    }
?>  