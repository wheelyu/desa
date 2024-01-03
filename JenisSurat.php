<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Pilih Jenis surat</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Kesumadadi</span>
    <div class="navbar-nav flex-row">
        <a href="tambah_user.php" class="btn btn-success mr-2">Tambah User</a>
        <a href="result.php" class="btn btn-light mr-2">Buat Surat</a>
        <a href="create.php" class="btn btn-light mr-2">Input Data</a>
        <a href="logout.php" class="btn btn-primary">Sign Out</a>
    </div>
</nav>
<?php
    include "process.php";

    // Inisialisasi variabel NIK
    $NIK = "";

    // Mengecek apakah parameter NIK ada dalam URL
    if(isset($_GET['NIK'])) {
        // Menyimpan nilai NIK dari URL ke variabel
        $NIK = $_GET['NIK'];

        // Melakukan sanitasi pada nilai NIK untuk menghindari SQL injection
        $NIK = mysqli_real_escape_string($conn, $NIK);
    }

    // Membuat query SQL
    $sql = "SELECT * FROM crud";

    // Menambahkan kondisi WHERE jika NIK tidak kosong
    if (!empty($NIK)) {
        $sql .= " WHERE NIK='$NIK'";
    } 

    // Mengeksekusi query SQL
    $hasil = mysqli_query($conn, $sql);
    $hasil2 = mysqli_query($conn, $sql);
    $hasil3 = mysqli_query($conn, $sql);
    $hasil4 = mysqli_query($conn, $sql);
    $hasil5 = mysqli_query($conn, $sql);
    $hasil6 = mysqli_query($conn, $sql);
    $hasil7 = mysqli_query($conn, $sql);
    $hasil8 = mysqli_query($conn, $sql);
    $hasil9 = mysqli_query($conn, $sql);
    $hasil10 = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil
    if (!$hasil) {
        die("Query error: " . mysqli_error($conn));
    }

    // Lanjutkan dengan menampilkan atau menggunakan hasil query sesuai kebutuhan Anda
?>

<h2 ><center>Pilih Jenis Surat<center></h2>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <table class="table w-100 my-3  table-bordered">
                            <tr class="table-info text-center">
                                <th>no</th>
                                <th>no. Surat</th>
                                <th>Kode Surat</th>
                                <th>Jenis Surat</th>
                                <th>aksi</th>
                            </tr>
                            <?php
                                // Melakukan perulangan untuk menampilkan setiap baris data
                                while ($row = mysqli_fetch_assoc($hasil)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>1</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR01</td>";
                                    echo "<td>Surat Keterangan telah menikah</td>";
                                    echo "<td><a href='ambil.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }
                                // Melakukan perulangan untuk menampilkan setiap baris data
                                while ($row = mysqli_fetch_assoc($hasil2)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>2</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR02</td>";
                                    echo "<td>Surat Keterangan Usaha</td>";
                                    echo "<td><a href='surat_keterangan_usaha.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil3)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>3</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR03</td>";
                                    echo "<td>Surat Keterangan Domisili</td>";
                                    echo "<td><a href='surat_keterangan_domisili.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil4)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>4</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR04</td>";
                                    echo "<td>Surat Keterangan Pemakaman</td>";
                                    echo "<td><a href='surat_keterangan_pemakaman.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil5)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>5</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR05</td>";
                                    echo "<td>Surat Keterangan Kehilangan</td>";
                                    echo "<td><a href='Surat_Kehilangan.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil6)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>6</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR06</td>";
                                    echo "<td>Surat izin Keramaian</td>";
                                    echo "<td><a href='surat_izin_keramaian.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil7)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>7</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR07</td>";
                                    echo "<td>Surat Pernyataan</td>";
                                    echo "<td><a href='surat_pernyataan.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil8)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>8</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR08</td>";
                                    echo "<td>Surat Keterangan beda identitas</td>";
                                    echo "<td><a href='surat_keterangan_beda_identitas.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil9)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>9</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR09</td>";
                                    echo "<td>Surat Keterangan ahli waris</td>";
                                    echo "<td><a href='ambil2.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }

                                while ($row = mysqli_fetch_assoc($hasil10)) {
                                    echo "<tr class='table text-center'>";
                                    echo "<td>10</td>";
                                    echo "<td>477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</td>";
                                    echo "<td>SR10</td>";
                                    echo "<td>Surat Keterangan Kematian</td>";
                                    echo "<td><a href='ambil3.php?NIK={$row['NIK']}' class='btn btn-warning w-100 format-control' target='_blank'>Cetak</a></td>";   
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
</section>
</body>
</html>