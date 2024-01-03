
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Input data</title>
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
    $searchNama = isset($_GET['searchNama']) ? htmlspecialchars($_GET['searchNama']) : '';

    // Modifikasi query SQL dengan kondisi pencarian
    $sql = "SELECT * FROM crud";
    if (!empty($searchNama)) {
        $sql3 .= " WHERE Nama='$searchNama'";
        $hasil3 = mysqli_query($conn, $sql3);
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
    $sql2 = "SELECT * FROM cruds";
    $hasil2 = mysqli_query($conn, $sql2);
    // Memeriksa apakah query berhasil
    if (!$hasil2) {
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
<div class="container">
    <br>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="searchNIK">Cari NIK:</label>
    <input type="text" name="searchNama" id="searchNama" value="<?php echo $searchNama; ?>">
    <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <h4><center>Daftar Penduduk Desa Kesumadadi</center></h4>

    <tr class="table-danger">
            <br>
        <thead>
        <tr>
    <div>

    
        <table class="table w-100 my-3  table-bordered">
            <tr class="table-primary text-middle">  
            <th>No</th>         
            <th>NIK</th>
            <th>Nama</th>
            <th>tempat</th>
            <th>tanggal lahir</th>
            <th>jenis kelamin</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>status</th>
            <th>pekerjaan</th>
            <th>kewarganegaraan</th>
            <th>Aksi</th>

        </tr>
        </thead>

        <?php
        if(empty($hasil3)) {
            echo "<p>Tidak ada data yang ditemukan.</p>";
            exit;
        }else{
        $no = 0;
        while ($data2 = mysqli_fetch_assoc($hasil2)) {
            $no++;
        ?>
        
        <tr>
            <td><?php echo $no;?></td>  
            <td><?php echo $data2["NIKS"]; ?></td>
            <td><?php echo $data2["NamaS"]; ?></td>
            <td><?php echo $data2["TempatS"]; ?></td>
            <td><?php echo $data2["Tanggal_LahirS"]; ?></td>
            <td><?php echo $data2["Jenis_kelaminS"]; ?></td>
            <td><?php echo $data2["AlamatS"]; ?></td>
            <td><?php echo $data2["AgamaS"]; ?></td>
            <td><?php echo $data2["StatusS"]; ?></td>
            <td><?php echo $data2["PekerjaanS"]; ?></td>
            <td><?php echo $data2["KewarganegaraanS"]; ?></td>
            <td>
                <div class="btn-group my-3 ">
                    <a href="surat_keterangan_telah_menikah.php?NIK=<?php echo htmlspecialchars($data['NIK']); ?>&NIKS=<?php echo htmlspecialchars($data2['NIKS']); ?>" class="btn btn-warning" role="button">Tambah data</a>
                </div>
            </td>
        </tr>
        <?php
        }
    }
        ?>


    </table>
    
</div>
</body>
</html>
