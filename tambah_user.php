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
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
<div class="container">
    <br>
    <h4><center>Daftar User</center></h4>
    <a href="input_user.php" class="btn btn-primary mx-auto" role="button">Tambah Data</a>
    <?php

        include "process.php";

        //Cek apakah ada kiriman form dari method post
        if (isset($_GET['ID'])) {
            $ID=htmlspecialchars($_GET["ID"]);

            $sql="delete from auth where ID='$ID' ";
            $hasil=mysqli_query($conn,$sql);

            //Kondisi apakah berhasil atau tidak
                if ($hasil) {
                    header("Location:tambah_user.php");

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

    
        <table class="table w-50 my-3  table-bordered mx-auto">
            <tr class="table-success  text-middle">  
            <th>No</th>         
            <th>Username</th>
            <th>Roles</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
            include "process.php";
            $sql="select * from auth order by ID desc";

            $hasil=mysqli_query($conn,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
        ?> 
            <tbody>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td><?php echo "admin" ?></td>
                    <td>
                        <div class="btn-group my-3 mr-3"> 
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?ID=<?php echo $data['ID']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    
</div>
</body>
</html>