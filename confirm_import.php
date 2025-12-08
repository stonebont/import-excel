<?php
session_start();
require 'db_connect.php'; // Koneksi DB

if (isset($_POST['confirm_import']) && isset($_SESSION['upload_data'])) {
    $data_to_import = $_SESSION['upload_data'];
    // $headers_used = $_SESSION['upload_headers']; // Jika perlu

    // Persiapan query INSERT (sesuaikan nama_tabel dan kolom Anda)
    $sql_insert = "INSERT INTO dari_excel (nama, email, telepon) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
   

    // Loop data dan INSERT ke DB
    $success_count = 0;
    foreach ($data_to_import as $row) {
        // Ambil data berdasarkan key array asosiatif (A, B, C)
        $nama = $row['A'] ?? null;
        $email = $row['B'] ?? null;
        $telepon = $row['C'] ?? null;

        // Pastikan data yang diperlukan ada sebelum insert
        if ($nama && $email && $telepon) {
            // Binding parameter dan eksekusi
            // Sesuaikan "sss" dengan tipe data kolom Anda (s=string, i=integer, d=double)
            $stmt->bind_param("sss", $nama, $email, $telepon); 
            if ($stmt->execute()) {
                $success_count++;
            }
        }
    }

    $stmt->close();
    $conn->close();

    // Bersihkan session setelah impor selesai
    unset($_SESSION['upload_data']);
    unset($_SESSION['upload_headers']);

    // Redirect dengan pesan sukses
    header("Location: index.php?status=success&count=$success_count");
    exit();

} else {
    // Jika akses langsung tanpa konfirmasi
    header("Location: index.php?status=error&message=Akses tidak valid.");
    exit();
}


?>
