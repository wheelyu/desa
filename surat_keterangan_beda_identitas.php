<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
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

    // Memeriksa apakah query berhasil
    if (!$hasil) {
        die("Query error: " . mysqli_error($conn));
    }

    // Mengambil data dari hasil query
    $data = mysqli_fetch_assoc($hasil);
} else {
    // Jika parameter NIK tidak ditemukan, bisa mengarahkan pengguna atau menampilkan pesan kesalahan
    echo "Parameter NIK tidak ditemukan.";
    exit();
}
$tanggal = date("d M Y");
?>
<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Surat keterangan beda identitas</title>
    <style>
                @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
        input, textarea{
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
                <font size="3" align="center" style="text-decoration: underline 2px;">SURAT KETERANGAN BEDA IDENTITAS</font><br>
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
        <table width = "450">
            <tr>
                <td style="font-size: 12px;">1. Data pada KTP</td>
            </tr>
        </table>

        <table width="550">
            <tr>
                <td style="font-size: 12px;"width="120">Nama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Nama']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">NIK</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['NIK']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Tempat tanggal lahir</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Tempat']; ?>, <?php echo $data['Tanggal_Lahir'];?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Agama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Agama']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Status Perkawinan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Status']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Alamat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Alamat']; ?></td>
            </tr>
        </table>

        <br>

        <table width="610">
            <tr>
                <td>
                    <font size="2">Adalah benar warna Penduduk Kampung Kesumadadi Kecamatan Bekri Kabupaten Lampung Tengah Beralamatkan tersebut diatas adalah benar bahwasanya satu orang yang sama dengan : </font>
                </td>
            </tr>
        </table>

        <br>
        <table width = "450">
            <tr>
                <td style="font-size: 12px;">2. Data pada SK KTP</td>
            </tr>
        </table>

        <table width="550">
        <tr>
                <td style="font-size: 12px;"width="120">Nama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="nama" name="nama"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">NIK</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="nik" name="nik"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Tempat tanggal lahir</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="Tempat" name="Tempat"></td>
            </tr>

            <tr>
                <td style="font-size: 12px;"width="120">Agama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="Agama" name="Agama"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Status Perkawinan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="Status" name="Status"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;"width="120">Alamat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><textarea id="tempat" name="tempat" rows="3"></textarea></td>
            </tr>

        </table>
        <br>

        <table width="610">
            <tr>
                <td>
                    <font size="2">Demikian surat keterangan ini dibuat dengan sebenarnya dan di berikan kepada yang bersangkutan sebagaimana mestinya</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td align="right" class="surat" style="padding-right: 98px;">
                    <span style="font-size: 12px;">Kesumadadi,&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tanggal; ?> </span> 
                </td>
            </tr>
            <tr>
                <td align="right" style="padding-right: 86px;">
                    <font size="2">Kepala Kampung Kesumadadi</font>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table width="630">
            <tr>
                <td align="right" style="padding-right: 120px;">
                    <font size="2"><b style="text-decoration: underline;">K.HABIBULLOH</b></font>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>