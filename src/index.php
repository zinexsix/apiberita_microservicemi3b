<?php

$host = "db";
$port = 3306;
$user = "root";
$password = "secretPassword";
$db_name = "db_berita";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi Berhasil";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Koneksi Gagal: " . $e->getMessage();
}
