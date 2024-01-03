<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }
?>
<?php
include "process.php";

// Mengecek apakah parameter NIK ada dalam URL
if(isset($_GET['NIK'])) {
    $NIK = $_GET['NIK'];

    // Melakukan sanitasi pada nilai NIK untuk menghindari SQL injection
    $NIK = mysqli_real_escape_string($conn, $NIK);

    // Membuat query SQL
    $sql = "SELECT * FROM crud WHERE NIK='$NIK'";
    $hasil = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil
    if (!$hasil) {
        die("Query error: " . mysqli_error($conn));
    }

    // Mengambil data dari hasil query
    $data = mysqli_fetch_assoc($hasil);
} else {
    // Jika parameter NIK tidak ditemukan, bisa mengarahkan pengguna atau menampilkan pesan kesalahan
    echo "Parameter NIK tidak ditemukan.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Cetak Surat</title>
    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        /* Media query cetak */
        @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            body {
                font-size: 12pt;
            }

            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
    </style>
    <body onload="window.print()">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Surat Domisili</h2>
        <table class="table table-bordered mt-3">
            <tr>
                <th>NIK</th>
                <td><?php echo $data['NIK']; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo $data['Nama']; ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?php echo $data['Tempat']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $data['Tanggal_Lahir']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo $data['Jenis_Kelamin']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $data['Alamat']; ?></td>
            </tr>
            <tr>
                <th>Agama</th>
                <td><?php echo $data['Agama']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $data['Status']; ?></td>
            </tr>
            <tr>    
                <th>Pekerjaan</th>
                <td><?php echo $data['Pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td><?php echo $data['Kewarganegaraan']; ?></td>
            </tr>
            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
        </table>
    </div>
</body>
</html>
<?php
include "process.php";

// Mengecek apakah parameter NIK ada dalam URL
if(isset($_GET['NIK'])) {
    $NIK = $_GET['NIK'];

    // Melakukan sanitasi pada nilai NIK untuk menghindari SQL injection
    $NIK = mysqli_real_escape_string($conn, $NIK);

    // Membuat query SQL
    $sql = "SELECT * FROM crud WHERE NIK='$NIK'";
    $hasil = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil
    if (!$hasil) {
        die("Query error: " . mysqli_error($conn));
    }

    // Mengambil data dari hasil query
    $data = mysqli_fetch_assoc($hasil);
} else {
    // Jika parameter NIK tidak ditemukan, bisa mengarahkan pengguna atau menampilkan pesan kesalahan
    echo "Parameter NIK tidak ditemukan.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Cetak Surat</title>
    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        /* Media query cetak */
        @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            body {
                font-size: 12pt;
            }

            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
    </style>
    <body onload="window.print()">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Surat Domisili</h2>
        <table class="table table-bordered mt-3">
            <tr>
                <th>NIK</th>
                <td><?php echo $data['NIK']; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo $data['Nama']; ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?php echo $data['Tempat']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $data['Tanggal_Lahir']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo $data['Jenis_Kelamin']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $data['Alamat']; ?></td>
            </tr>
            <tr>
                <th>Agama</th>
                <td><?php echo $data['Agama']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $data['Status']; ?></td>
            </tr>
            <tr>    
                <th>Pekerjaan</th>
                <td><?php echo $data['Pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td><?php echo $data['Kewarganegaraan']; ?></td>
            </tr>
            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
        </table>
    </div>
</body>
</html>
