
<?php
session_start(); // Mulai sesi
// Cek apakah sesi pengguna sudah ada
    if (!isset($_SESSION['username'])) {
        // Jika belum ada, redirect ke halaman login
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


<div class="container">
    <br>
    <h4><center>Daftar Penduduk Desa Kesumadadi</center></h4>
    <?php

        include "process.php";

        //Cek apakah ada kiriman form dari method post
        if (isset($_GET['ID'])) {
            $ID=htmlspecialchars($_GET["ID"]);

            $sql="delete from crud where ID='$ID' ";
            $sql2="delete from cruds where IDS='$ID' ";
            $hasil=mysqli_query($conn,$sql);
            $hasil2=mysqli_query($conn,$sql2);
            //Kondisi apakah berhasil atau tidak
                if ($hasil && $hasil2) {
                    header("Location:create.php");

                }
                else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

                }
            }
    ?>


    <tr class="table-danger">
            <br>
        <thead>
        <tr>
    <div>

    
        <table class="table w-100 my-3  table-bordered">
            <tr class="table-success  text-middle">  
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
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
            include "process.php";
            $sql="select * from crud order by ID desc";

            $hasil=mysqli_query($conn,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
        ?> 
            <tbody>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data["NIK"]; ?></td>
                    <td><?php echo $data["Nama"]; ?></td>
                    <td><?php echo $data["Tempat"]; ?></td>
                    <td><?php echo $data["Tanggal_Lahir"]; ?></td>
                    <td><?php echo $data["Jenis_Kelamin"]; ?></td>
                    <td><?php echo $data["Alamat"]; ?></td>
                    <td><?php echo $data["Agama"]; ?></td>
                    <td><?php echo $data["Status"]; ?></td>
                    <td><?php echo $data["Pekerjaan"]; ?></td>
                    <td><?php echo $data["Kewarganegaraan"]; ?></td>
                    <td>
                        <div class="btn-group my-3 mr-3"> 
                            <a href="update.php?ID=<?php echo htmlspecialchars($data['ID']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?ID=<?php echo $data['ID']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    <a href="input.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
