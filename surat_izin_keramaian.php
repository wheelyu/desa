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
    <title>Surat Izin Keramaian</title>
    <style>
        @media print {
            /* Semua elemen yang ada dalam media query cetak akan muncul di cetakan */
            /* Tambahkan aturan gaya tambahan sesuai kebutuhan cetakan */
        }
        input, textarea{

        border: none;
            font-size: 12px;
            width: 80%;
        }
        table tr td {
            font-size: 12px;
            vertical-align: top;
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
        <br>
<table width="550">
    <tr>
        <td style="font-size: 12px; width: 300px;">Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 331/&nbsp;&nbsp;&nbsp;&nbsp;/Kc.a.VIII.05.02/20..</td>
        <td style="font-size: 12px;" align="right">Kepada,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table>

<table width="550">
        <tr>
            <td style="font-size: 12px;">Lampiran&nbsp;&nbsp;&nbsp;:</td>
            <td width="400" style="font-size: 12px;" align="right">Bpk. Kapolsek Gunung Sugih</td>
        </tr>
        </table>
<table width="550">
        <tr>
            <td style="font-size: 12px;">Perihal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td width="400" style="font-size: 12px;" align="right">Di-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </table>
<table width="550">
        <tr>
            
            <td width="400" style="font-size: 12px;" align="right">Gunung Sugih&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </table>
    

    <center>
        <table width="610">
            <tr>
                <td class="pembukaan" style="font-size: 12px;">Dengan Hormat,<br>Dengan ini kami sampaikan kepada Bapak Kapolsek Gunung Sugih Permohonan Izin Keramaian atau Hiburan dari seorang warga kami :</td>
            </tr>
        </table>

        <table width="550">
            <tr>
                <td style="font-size: 12px;"width="120">Nama</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Nama']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Umur</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="umur" name="umur"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Pekerjaan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Pekerjaan']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Alamat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['Alamat']; ?></td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td class="pembukaan" style="font-size: 12px;">Bahwa nama tersebut dimaksud, mohon diberikan Surat Izin Keramaian atau Hiburan sehubungan dengan <!--Input manual text nama acara yg di selenggarakan--> yang akan diramaikan dengan hiburan<!--input manual acara yang akan diselenggarakan--> Dan akan dilaksanakan/dilakukan pada :</td>
            </tr>
        </table>

        <table width="550">
            <tr>
                <td style="font-size: 12px;">Hari</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="hari" name="hari"></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Tanggal</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="tanggal" name="tanggal"></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">Jam/Pukul</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="jam" name="jam"></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">Tempat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><textarea id="tempat" name="tempat" rows="3"></textarea></td>

            </tr>
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
        <td align="right" class="surat">
            <span style="font-size: 12px;padding-right: 174px;">Dibuat di :</span> <br>
            <span style="font-size: 12px;padding-right: 110px;">Pada Tanggal : <?php echo $tanggal; ?></span>
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
<table width="350">
    <tr>
        <td align="right" style="padding-right: px;">
            <font size="2"><b style="text-decoration: underline;">K.HABIBULLOH</b></font>
        </td>
    </tr>
</table>
<table align="center">
    <tr>
        <td>
            <font size="2">Mengetahui,</font>
        </td>
    </tr>
</table>
<table width="550">
    <tr>
        <td style="font-size: 12px;" align="center">Camat Bekri</td>
        <td width="400" style="font-size: 12px;" align="right">DANRAMIL Gunung Sugih</td>
    </tr>
    </table>
    <br><br><br><br><br>
    </center>
</body>
</html>