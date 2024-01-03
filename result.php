
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
    $searchNIK = isset($_GET['searchNIK']) ? htmlspecialchars($_GET['searchNIK']) : '';

    // Modifikasi query SQL dengan kondisi pencarian
    $sql = "SELECT * FROM crud";
    if (!empty($searchNIK)) {
        $sql .= " WHERE NIK='$searchNIK'";
    } 
    $hasil = mysqli_query($conn, $sql);

    if (!$hasil) {
        die("Query error: " . mysqli_error($conn));
    }
?>

<div class="container">
    <br>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="searchNIK">Cari NIK:</label>
    <input type="text" name="searchNIK" id="searchNIK" value="<?php echo $searchNIK; ?>">
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
        if(empty($hasil)) {
            echo "<p>Tidak ada data yang ditemukan.</p>";
            exit;
        }else{
        $no = 0;
        while ($data = mysqli_fetch_assoc($hasil)) {
            $no++;
        ?>
        
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
                <div class="btn-group my-3 ">
                    <a href="JenisSurat.php?NIK=<?php echo htmlspecialchars($data['NIK']); ?>" class="btn btn-warning" role="button">buat surat</a>
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
