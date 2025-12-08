<!DOCTYPE html>
<html lang="id">
<head>
    <title>Impor Excel ke Database MySQL</title>
</head>
<body>
    <h1>Unggah File Excel</h1>
    <button onclick="location.reload()">Refresh Halaman</button>

    <?php
    
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green;'>Berhasil mengimpor " . htmlspecialchars($_GET['imported']) . " data. Dilewati: " . htmlspecialchars($_GET['errors']) . ".</p>";
        } else if ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Error: " . htmlspecialchars($_GET['message'] ?? 'Terjadi kesalahan tidak diketahui') . "</p>";
        }
    }
    ?>

    <!-- Pastikan enctype="multipart/form-data" diperlukan untuk upload file -->
    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" id="excelFile" accept=".xls,.xlsx" required>
        <button type="submit" name="submit">Pratinjau Data</button>
    </form>
</body>
</html>
