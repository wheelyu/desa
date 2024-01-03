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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles2.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="script.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-3">
    <a href="create.php" class="btn btn-light mr-2">Back</a>
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
        $NIK=input($_POST["NIK"]);
        $Nama=input($_POST["Nama"]);
        $tempat=input($_POST["Tempat"]);
        $tanggal=input($_POST["Tanggal_Lahir"]);
        $j_k=input($_POST["Jenis_Kelamin"]);
        $alamat=input($_POST["Alamat"]);
        $agama=input($_POST["Agama"]);
        $status=input($_POST["Status"]);
        $pekerjaan=input($_POST["Pekerjaan"]);
        $kewarganergaraan=input($_POST["Kewarganegaraan"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into crud (NIK,Nama,Tempat,Tanggal_Lahir,Jenis_kelamin,Alamat,Agama,Status,Pekerjaan,Kewarganegaraan) values
		('$NIK','$Nama','$tempat','$tanggal','$j_k','$alamat','$agama','$status','$pekerjaan','$kewarganergaraan')";
        $sql2="insert into cruds (NIKS,NamaS,TempatS,Tanggal_LahirS,Jenis_kelaminS,AlamatS,AgamaS,StatusS,PekerjaanS,KewarganegaraanS) values
		('$NIK','$Nama','$tempat','$tanggal','$j_k','$alamat','$agama','$status','$pekerjaan','$kewarganergaraan')";
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);
        $hasil2=mysqli_query($conn,$sql2);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil && $hasil2) {
            header("Location:create.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>

    <h1>Formulir pengisian data penduduk</h1>
    <section>   
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
            <table>
                <tr>
                    <td><h2>NIK</h2></td>
                    <td><input type="text" name="NIK" id="NIK" required   placeholder="NIK"></td>
                </tr>
                <tr>
                    <td><h2>Nama</h2></td>
                    <td><input type="text" name="Nama" id="Nama" required   placeholder="Nama"></td>
                </tr>
                <tr>
                    <td> <h2>Tempat Lahir</h2></td> 
                    <td><input type="text" name="Tempat" id="Tempat" required   placeholder="Tempat Lahir"></td>
                </tr>
                <tr>
                    <td><h2>Tanggal Lahir</h2></td>
                    <td><input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" required placeholder="Tanggal"></td>
                </tr>
                <tr>
                    <td><h2>Jenis Kelamin</h2></td>
                    <td> <select name="Jenis_Kelamin" id="Jenis_Kelamin" required >
                        <option value="0" selected>pilih</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><h2>Alamat </h2></td>
                    <td> <textarea id="Alamat" name="Alamat" rows="6"  required placeholder="Alamat"></textarea></td>
                </tr>
                <tr>
                    <td><h2>Agama</h2></td>
                    <td><input type="text" name="Agama" id="Agama" required placeholder="Agama"></td>
                </tr>
                <tr>
                    <td><h2>status</h2></td>
                    <td><input type="text" name="Status" id="Status" required placeholder="status"></td>
                </tr>
                <tr>
                    <td><h2>Pekerjaan</h2></td>
                    <td><input type="text" name="Pekerjaan" id="Pekerjaan" required placeholder="pekerjaan"></td>
                </tr>
                <tr>
                    <td><h2>kewarganegaraan</h2></td>
                    <td><input type="text" name="Kewarganegaraan" id="Kewarganegaraan" required placeholder="kewarganegaraan"></td>
                </tr>
            </table>
            <div class="tombol">
                <button  class="btn2" type="submit" onclick="succes()">Submit</button>
            </div>
        </form>


    </section>

</body>
</html>