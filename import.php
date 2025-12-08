<?php
require 'vendor/autoload.php'; // Autoload PhpSpreadsheet
// require 'db_connect.php'; // Koneksi DB, tidak perlu di sini dulu
use PhpOffice\PhpSpreadsheet\IOFactory;

$preview_data = null;
$headers = null;

if (isset($_POST['submit'])) {
    // Cek apakah file diunggah
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
        $file_temp_path = $_FILES['excelFile']['tmp_name'];
        $file_extension = pathinfo($_FILES['excelFile']['name'], PATHINFO_EXTENSION);

        // Validasi ekstensi file sederhana (opsional)
        if ($file_extension == 'xlsx' || $file_extension == 'xls') {
            // Baca file Excel
            $spreadsheet = IOFactory::load($file_temp_path);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true); // Menggunakan array asosiatif untuk kemudahan akses

            // Header/Nama Kolom (sesuaikan dengan file Excel Anda)
            // Asumsikan baris pertama adalah header
            $headers = array_shift($data);
            $preview_data = $data;

            // Simpan data ke session agar bisa diakses di permintaan POST berikutnya (untuk konfirmasi impor)
            session_start();
            $_SESSION['upload_headers'] = $headers;
            $_SESSION['upload_data'] = $preview_data;
            
        } else {
            echo "Format file tidak didukung. Harap unggah file Excel (.xlsx atau .xls).";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi error.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Import Data Excel & Preview</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Pratinjau</h2> <!--
<form action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" name="excelFile" accept=".xlsx, .xls" required>
    <button type="submit" name="submit">Pratinjau & Upload</button>
</form> 
echo '<button onclick="history.back()">Kembali ke Halaman Sebelumnya</button>';
 Atau: 
echo '<a href="javascript:history.go(-1)">« Go back</a>'; // Tautan teks-->

<?php if ($preview_data && $headers): ?>
    <h3>Data (10 baris pertama)</h3>
    <p>Pastikan kolom sesuai dengan database: Kolom A -> nama, Kolom B -> email, Kolom C -> telepon</p>
    <table>
        <thead>
            <tr>
                <?php foreach ($headers as $header): ?>
                    <th><?php echo htmlspecialchars($header); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 0;
            foreach ($preview_data as $row): 
                if ($count >= 10) break; // Hanya tampilkan 10 baris
                // Asumsi data di kolom A, B, C
                $nama = $row['A'] ?? '';
                $email = $row['B'] ?? '';
                $telepon = $row['C'] ?? '';
            ?>
            <tr>
                <td><?php echo htmlspecialchars($nama); ?></td>
                <td><?php echo htmlspecialchars($email); ?></td>
                <td><?php echo htmlspecialchars($telepon); ?></td>
            </tr>
            <?php 
                $count++;
            endforeach; 
            ?>
        </tbody>
    </table>
    
    <!-- Formulir konfirmasi impor -->
    <form action="confirm_import.php" method="post" style="margin-top: 20px;">
        <button type="submit" name="confirm_import">Konfirmasi & Import ke Database</button>
        <button onclick="history.back()">Cancel</button>
    </form>

<?php endif; ?>

</body>
</html>
