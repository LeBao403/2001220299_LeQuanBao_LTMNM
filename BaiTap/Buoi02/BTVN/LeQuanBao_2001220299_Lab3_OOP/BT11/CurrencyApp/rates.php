<?php
header("Content-Type: application/json; charset=UTF-8");

// --- Cách 1: Lấy từ API thật ---
$apiUrl = "https://open.er-api.com/v6/latest/USD"; // API miễn phí

$response = @file_get_contents($apiUrl);

if ($response !== false) {
    echo $response; // API đã trả JSON sẵn
} else {
    // --- Cách 2: fallback đọc file JSON ---
    echo file_get_contents("rates.json");
}
