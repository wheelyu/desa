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
    <title>Sistem Admnistrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles2.css">
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
    if (isset($_GET['ID'])) {
        $ID=input($_GET["ID"]);
        $sql="select * from crud where ID=$ID";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ID=htmlspecialchars($_POST["ID"]);
            $nik=input($_POST["NIK"]);
            $nama=input($_POST["Nama"]);
            $tempat=input($_POST["Tempat"]);
            $tanggal=input($_POST["Tanggal_Lahir"]);
            $j_k=input($_POST["Jenis_Kelamin"]);
            $alamat=input($_POST["Alamat"]);
            $agama=input($_POST["Agama"]);
            $status=input($_POST["Status"]);
            $pekerjaan=input($_POST["Pekerjaan"]);
            $kewarganergaraan=input($_POST["Kewarganegaraan"]);
            //Query update data pada tabel anggota
            $sql="update crud set
                NIK='$nik',
                Nama='$nama',
                Tempat='$tempat',
                Tanggal_Lahir='$tanggal',
                Jenis_Kelamin='$j_k',
                Alamat='$alamat',
                Agama='$agama',
                Status='$status',
                Pekerjaan ='$pekerjaan',
                Kewarganegaraan='$kewarganergaraan'
                where ID=$ID";
            $sql2="update cruds set
                NIKS='$nik',
                NamaS='$nama',
                TempatS='$tempat',
                Tanggal_LahirS='$tanggal',
                Jenis_KelaminS='$j_k',
                AlamatS='$alamat',
                AgamaS='$agama',
                StatusS='$status',
                PekerjaanS ='$pekerjaan',
                KewarganegaraanS='$kewarganergaraan'
                where IDS=$ID";
            //Mengeksekusi atau menjalankan query diatas
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

    <h1>Update data penduduk</h1>
    <section>   
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <table>
                <tr>
                    <td><h2>NIK</h2></td>
                    <td><input type="text" name="NIK" id="NIK" required   placeholder="NIK" value="<?= $data['NIK'] ?>"></td>
                </tr>
                <tr>
                    <td><h2>Nama</h2></td>
                    <td><input type="text" name="Nama" id="Nama" required   placeholder="Nama" value="<?= $data['Nama'] ?>"></td>
                </tr>
                <tr>
                    <td> <h2>Tempat Lahir</h2></td>
                    <td><input type="text" name="Tempat" id="Tempat" required   placeholder="Tempat Lahir"value="<?= $data['Tempat'] ?>",></td>
                </tr>
                <tr>
                    <td><h2>Tanggal Lahir</h2></td>
                    <td><input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" required placeholder="Tanggal" value="<?= $data['Tanggal_Lahir'] ?>",></td>
                </tr>
                <tr>
                    <td><h2>Jenis Kelamin</h2></td>
                    <td> <select name="Jenis_Kelamin" id="Jenis_Kelamin" required value="<?= $data['Jenis_Kelamin'] ?>">
                        <option value="0" selected>pilih</option>
                        <option value="laki-laki" <?= ($data['Jenis_Kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan"<?= ($data['Jenis_Kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><h2>Alamat </h2></td>
                    <td> <textarea id="Alamat" name="Alamat" rows="6"  required placeholder="Alamat" ><?= $data['Alamat'] ?></textarea></td>
                </tr>
                <tr>
                    <td><h2>Agama</h2></td>
                    <td><input type="text" name="Agama" id="Agama" required placeholder="Agama" value="<?= $data['Agama'] ?>",></td>
                </tr>
                <tr>
                    <td><h2>status</h2></td>
                    <td><input type="text" name="Status" id="Status" required placeholder="status" value="<?= $data['Status'] ?>",></td>
                </tr>
                <tr>
                    <td><h2>Pekerjaan</h2></td>
                    <td><input type="text" name="Pekerjaan" id="Pekerjaan" required placeholder="pekerjaan" value="<?= $data['Pekerjaan'] ?>",></td>
                </tr>
                <tr>
                    <td><h2>kewarganegaraan</h2></td>
                    <td><input type="text" name="Kewarganegaraan" id="Kewarganegaraan" required placeholder="kewarganegaraan" value="<?= $data['Kewarganegaraan'] ?>",></td>
                </tr>
            </table>
            <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>" />

            <div class="tombol">
                <button  class="btn2" type="submit" onclick="succes()">Submit</button>
            </div>
        </form>
    </section>

</body>
</html>