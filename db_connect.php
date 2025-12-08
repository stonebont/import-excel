<?php
$servername = "localhost";
$username   = "stonebon_uhighcharts";
$password   = "Bismillah123";
$dbname     = "stonebon_highcharts";

// Koneksi menggunakan MySQLi Object-Oriented
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Opsional: set charset
$conn->set_charset("utf8mb4");
?>