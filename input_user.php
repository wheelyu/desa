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
    <title>Sistem Admnistrasi</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles2.css">
    <script src="script.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-3">
    <a href="tambah_user.php" class="btn btn-light mr-2">Back</a>
</nav>
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "process.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $NIK=input($_POST["username"]);
        $Nama=input($_POST["password"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into auth (username, password) values
		('$username','$password')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:tambah_user.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>

    <h1>tambah user</h1>
    <section>   
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
            <table>
                <tr>
                    <td><h2>username</h2></td>
                    <td><input type="text" name="username" id="username" required   placeholder="username"></td>
                </tr>
                <tr>
                    <td><h2>Password</h2></td>
                    <td><input type="password" name="password" id="password" required   placeholder="password"></td>
                </tr>
            </table>
            <div class="tombol">
                <button  class="btn2" type="submit" onclick="succes()">Submit</button>
            </div>
        </form>


    </section>

</body>
</html>