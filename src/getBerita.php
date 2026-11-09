<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$host = "db";// ini disesuaikan dengan nama service database di docker-compose.yml
$user = "root";// ini disesuaikan dengan username database di docker-compose.yml
$password = "secretPassword";// ini disesuaikan dengan password database di docker-compose.yml
$db_name = "db_berita";// ini disesuaikan dengan nama database di docker-compose.yml

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil semua berita
    $stmt = $conn->prepare("SELECT * FROM tb_berita");
    $stmt->execute();
    $berita = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        "status" => "success",
        "data" => $berita,
        "code" => 200,
        "message" => "Berita berhasil diambil"

    ],JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "code" => 500,
        "message" => "Koneksi Gagal: " . $e->getMessage()
    ],JSON_PRETTY_PRINT);
    http_response_code(500);
}
