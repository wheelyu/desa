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
    <title>Surat Keterangan Telah Menikah</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
        @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
        input {
        border: none;
            font-size: 14px;
            width: 100%;
        }   
        table tr td {
            font-size: 14px;
        }
        table tr alamat {
            text-align: right;
            font-size: 14px;
        }
        table tr pembukaan {
            text-align: right;
            font-size: 14px;
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
                <font size="3" align="center" style="text-decoration: underline 2px;">SURAT KETERANGAN TELAH MENIKAH</font><br>
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
                <td class="pembukaan" style="font-size: 14px;">Yang bertanda tangan di bawah ini Kepala kampung Kesumadadi Kecamatan Bekri Kabupaten Lampung Tengah menerangkan :</td>
            </tr>
        </table>
        
        <br>

<table width="550">
    <tr>
        <td style="font-size: 14px;">1. </td>
        <td style="font-size: 14px;"width="120">NIK</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['NIK']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Nama Lengkap  </td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Nama']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;">Bin  </td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><input type="text" id="bin" name="bin"></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Tempat Tanggal Lahir</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Tempat']; ?>, <?php echo $data['Tanggal_Lahir'];?></td>

    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Jenis kelamin</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Jenis_Kelamin']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Agama</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Agama']; ?></td>

    </tr>
    <tr>
        <td></td>   
        <td style="font-size: 14px;"width="120">Kewarganegaraan</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Kewarganegaraan']; ?></td>

    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Status Perkawinan</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Status']; ?></td>

    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Pekerjaan</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Pekerjaan']; ?></td>

    </tr>
    <tr>
        <td></td>
        <td style="font-size: 14px;"width="120">Alamat Tinggal</td>
        <td width="10">:</td>
        <td style="font-size: 14px;"><?php echo $data['Alamat']; ?></td>
    </tr>
    </table>
        <br>

    <table width="550">
        <tr>
            <td style="font-size: 14px;">2. </td>
            <td style="font-size: 14px;"width="120">NIK</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['NIKS']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Nama Lengkap  </td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['NamaS']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;">Binti  </td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><input type="text" id="binti" name="binti"></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Tempat Tanggal Lahir</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['TempatS']; ?>, <?php echo $data['Tanggal_Lahir'];?></td>

        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Jenis kelamin</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['Jenis_kelaminS']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Agama</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['AgamaS']; ?></td>

        </tr>
        <tr>
            <td></td>   
            <td style="font-size: 14px;"width="120">Kewarganegaraan</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['KewarganegaraanS']; ?></td>

        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Status Perkawinan</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['StatusS']; ?></td>

        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Pekerjaan</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['PekerjaanS']; ?></td>

        </tr>
        <tr>
            <td></td>
            <td style="font-size: 14px;"width="120">Alamat Tinggal</td>
            <td width="10">:</td>
            <td style="font-size: 14px;"><?php echo $data2['AlamatS']; ?></td>
        </tr>
    </table>
        <br>

        <table width="610">
            <tr>
                <td>
                    <font size="2">Dengan ini di terangkan orang yang beralamatkan tersebut diatas adalah benar adalah suami istri dan telah menikah baik resmi secara agama dan pemerintahan</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td>
                    <font size="2">Demikian surat keterangan ini dibuat berdasarkan keterangan dari kepada dusun dan RT Setempat</font>
                </td>
            </tr>
        </table>
        <table width = "610">
            <tr>
            <td align="right" class="surat">
                    <span style="font-size: 14px;padding-right: 174px;">Dibuat di :</span> <br>
                    <span style="font-size: 14px;padding-right: 110px;">Pada Tanggal : <?php echo $tanggal; ?></span>
                </td>
            </tr>
        </table>
        <br>
        <table width = "340">
            <tr>
                <td align="right">
                    <font size="2">Mengetahui</font>
                </td>
            </tr>

        </table>
        <table width="610">   
            <tr>
                <td align="right" style="padding-right: 86px;">
                    <font size="2">Kepala Kampung Kesumadadi</font>
                </td>
            </tr>
            <tr>
                <td align="right" style="padding-right: 86px;">
                    <font size="2"><br><br><br></font>

                </td>
            </tr>
        </table>
        <br>
        <table width="350">
            <tr>
                <td align="right" style="padding-right: px;">
                    <font size="2"><b style="text-decoration: underline;">K.HABIBULLOH</b></font>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>