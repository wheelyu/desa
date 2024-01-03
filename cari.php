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
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Sistem administrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        /* Penyesuaian tambahan jika diperlukan */
        section {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        /* CSS khusus untuk mengatur tinggi kolom input */
        .custom-input {
            height: 150px; /* Sesuaikan tinggi kolom input sesuai kebutuhan */
            border-radius: 30px;
            font-size: 16px; /* Sesuaikan ukuran font sesuai kebutuhan */
            text-align: center;
            font-size: 32px;
        }
        .custom-tombol{
            width: 120px;
            border-radius: 30px;
        }
    </style>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Kesumadadi</span>
            <div class="navbar-nav flex-row">
                <a href="tambah_user.php" class="btn btn-success mr-2">Tambah User</a>
                <a href="cari.php" class="btn btn-light mr-2">Cari Data</a>
                <a href="create.php" class="btn btn-light mr-2">Input Data</a>
                <a href="logout.php" class="btn btn-primary">Sign Out</a>
            </div>
    </nav>

<?php
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    include "process.php";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $searchNIK=input($_POST["searchNIK"]);
        // Modifikasi query SQL dengan kondisi pencarian
        $sql = "SELECT * FROM crud";
        if (!empty($searchNIK)) {
            $sql .= " WHERE NIK='$searchNIK'";
        }  else{
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }

        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            header("Location:result.php");
        }else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

        }
    }
?>
    <section class="d-flex flex-column justify-content-center align-items-center">
        <h1><center>Anda dapat Mencari Data Penduduk di Sini<center></h1>
        <h4><center>silahkan masukkan NIK penduduk yang ingin di cari<center></h4>
        <form class="w-75" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="mb-3">
                <input type="number" class="form-control custom-input" name="searchnik" id="searchnik" required>
            </div>
            <div class="tombol">
                <button class="btn btn-primary form-control custom-tombol" type="submit">Cari</button>
            </div>
        </form>
    </section>
</body>
</html>