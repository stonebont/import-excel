<?php
$servername = "localhost";
$username   = "your_username";
$password   = "your_password";
$dbname     = "your_db_name";

// Koneksi menggunakan MySQLi Object-Oriented
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Opsional: set charset
$conn->set_charset("utf8mb4");
?>
