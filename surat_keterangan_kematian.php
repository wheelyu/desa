<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }
?>
<?php
include "process.php";

// Mengecek apakah parameter NIK dan NIK2 ada dalam URL
if (isset($_GET['NIK']) && isset($_GET['NIKS'])) {
    $NIK = $_GET['NIK'];
    $NIK2 = $_GET['NIKS'];

    // Validasi NIK dan NIK2 (sesuaikan dengan kebutuhan)
    if (empty($NIK) || empty($NIK2)) {
        echo "Parameter NIK atau NIK2 tidak valid.";
        exit();
    }

    // Melakukan sanitasi pada nilai NIK untuk menghindari SQL injection
    $NIK = mysqli_real_escape_string($conn, $NIK);
    $NIK2 = mysqli_real_escape_string($conn, $NIK2);

    // Menggunakan prepared statements
    $sql = "SELECT * FROM crud WHERE NIK=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $NIK);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);

    $sql2 = "SELECT * FROM cruds WHERE NIKS=?";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "s", $NIK2);
    mysqli_stmt_execute($stmt2);
    $hasil2 = mysqli_stmt_get_result($stmt2);

    // Memeriksa apakah query berhasil
    if (!$hasil || !$hasil2) {
        die("Query error: " . mysqli_error($conn));
    }

    // Mengambil data dari hasil query
    $data = mysqli_fetch_assoc($hasil);
    $data2 = mysqli_fetch_assoc($hasil2);

    // Proses data selanjutnya sesuai kebutuhan

    // Tutup prepared statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);

} else {
    // Jika parameter NIK atau NIK2 tidak ditemukan, berikan pesan kesalahan
    echo "Parameter NIK atau NIK2 tidak ditemukan.";
    exit();
}
$tanggal = date("d M Y");
?>
<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Surat Keterangan Kematian</title>
    <style>
        @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
        input{
            border: none;
            width: 100%;
        }
        table tr td {
            font-size: 12px;
        }
        table tr alamat {
            text-align: right;
            font-size: 12px;
        }
        table tr pembukaan {
            text-align: right;
            font-size: 12px;
        }
         /* CSS untuk tata letak horizontal */
        .horiz_table {
            display: flex;
            justify-content: space-between;
        }
        .horiz_table table {
            width: 300px; /* Lebar tabel masing-masing */
            margin-right: 20px; /* Jarak antar tabel */
            border-collapse: collapse; /* Menggabungkan border jika ada */
        }
        .horiz_table td {
            padding-right: 10px; /* Padding di kanan untuk konten */
            text-align: right; /* Penyusunan teks ke kanan */
        }
    </style>
    <body onload="window.print()">
</head>
<body>
    <center>
        <table width="610" align="center">
            <tr>
                <td align="center"><img src="https://i.ibb.co/NjB0Rqb/Lambang-Kabupaten-Lampung-Tengah.png" width="80" height="80"></td>
                <td align="center">
                    <font size="4">PEMERINTAH KABUPATEN LAMPUNG TENGAH</font><br>
                    <font size="5">KECAMATAN BEKRI</font><br>
                    <font size="5">KAMPUNG KESUMADADI</font><br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><hr></td>
            </tr>
        </table>
        
        <table width="610">
            <tr>
                <!-- Teks dengan rata tengah -->
                <td class="alamat" align="center" style="text-decoration: underline 1px;">Jl. Karyo Amin No.5 Kampung Kesumadadi, Kecamatan Bekri, Kabupaten Lampung Tengah, Kode Pos 34161</td>
            </tr>
            <tr>
                <td colspan="1" align="center"><hr></td>
            </tr>
        </table>

        <table width="610" align="center">
            <tr>
                <font size="3" align="center" style="text-decoration: underline 2px;">SURAT KETERANGAN KEMATIAN</font><br>
            </tr>
            <tr>
                <td align="center">
                    <font size="2">Nomor : 477/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a VIII 05.02/20..</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td class="pembukaan" style="font-size: 12px;">Yang bertanda tangan di bawah ini Kepala kampung Kesumadadi Kecamatan Bekri Kabupaten Lampung Tengah menerangkan bahwa :</td>
            </tr>
        </table>
        
        <br>

        <table width="550">
            <tr>
                <td style="font-size: 12px;"width="120">Nama Lengkap : </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Nama']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Umur : </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="umur" name="umur"></td>
            </tr>
            <tr>
            <td style="font-size: 12px;"width="120">Jenis kelamin</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Jenis_Kelamin']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Kewarganegaraan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Kewarganegaraan']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Agama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Agama']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Pekerjaan Terakhir </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Pekerjaan']; ?></td>
            </tr>
            <tr>    
                <td style="font-size: 12px;">Alamat Dahulu</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Alamat']; ?></td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
            <td><font size="2">Adalah benar warga Kampung Kesumadadi Kecamatan Bekri Kabupaten Lampung Tengah dan telah meninggal dunia pada hari <!--input manual berisi hari, tanggal, bulan, tahun--> di rumah tempat tinggal nya dan dimakamkan di TPU <!--input manual lokasi pemakaman-->.</font></td>
            </tr> 
        </table>
        <br>

        <table width="610">
        <tr>
            <td><font size="2">Surat keterangan ini dibuat berdasarkan keterangan Pelapor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </font></td>
        </tr> 
        </table>
        <br>
        <table width="550">
        <tr>
                <td style="font-size: 12px;"width="120">Nama Lengkap : </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['NamaS']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Umur : </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="umur" name="umur"></td>
            </tr>
            <tr>
            <td style="font-size: 12px;"width="120">Jenis kelamin</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['Jenis_kelaminS']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Kewarganegaraan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['KewarganegaraanS']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Agama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['AgamaS']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Pekerjaan Terakhir </td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['PekerjaanS']; ?></td>
            </tr>
            <tr>    
                <td style="font-size: 12px;">Alamat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data2['AlamatS']; ?></td>
            </tr>
        </table>
        <br>


        <table width="610">
            <tr>
                <td>
                    <font size="2">Demikian surat keterangan ini dibuat dengan benar dan dapat dipergunakan sebagaimana mestinya.</font>
                </td>
            </tr>
        </table>
        <table width = "610">
            <tr>
                <td align="right" class="surat" style="padding-right: 65px">
                    <span style="font-size: 12px;">Kesumadadi, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20..</span> 
                </td>
            </tr>
        </table>
        <table width="550">
            <tr>
                <td style="font-size: 12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pelapor&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td style="font-size: 12px;" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Kampung Kesumadadi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>
        <br>
<br>
<br>
<br>
<table width="385">
    <tr>
        <td align="right" style="padding-right: px;">
            <font size="2"><b style="text-decoration: underline;">K.HABIBULLOH</b></font>
        </td>
    </tr>
</table>
    </center>
</body>
</html>