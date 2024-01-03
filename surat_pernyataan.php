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
    <title>Surat Pernyataan</title>
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
        <br>
        <br>
        <br>
        <table width="610" align="center">
            <tr>
                <td style="text-align: center;">
                    <h2 style="text-decoration: underline;">SURAT PERNYATAAN</h2>
                </td>
            </tr>
        </table>

        <br>
        <table width="610">
            <tr>
                <td class="pembukaan" style="font-size: 12px;">Yang bertanda tangan di bawah ini :</td>
            </tr>
        </table>

        <table width="610">
            <tr>
                <td style="font-size: 12px;">NIK/No. KTP</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><?php echo $data['NIK']; ?></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">NO. Hp</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="hp" name="hp"></td>

            </tr>
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
                <td>
                    <font size="2">Sehubungan permohonan saya tentang Izin Keramaian kepada Kapolsek Gunung Sugih Nomor : 331/494/kc.a.VIII.05.02/20.. Tanggal&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/20..</font>
                </td>
            </tr>
        </table>

        <table  width="610">
            <tr>
                <td style="font-size: 12px;">Dalam Rangka</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="rangka" name="rangka"></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">Dengan Hiburan</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="hiburan" name="hiburan"></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">Yang akan dilaksanakan pada</td>
            </tr>
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
                <td style="font-size: 12px;">Jam</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><input type="text" id="jam" name="jam"></td>

            </tr>
            <tr>
                <td style="font-size: 12px;">Tempat</td>
                <td width="10">:</td>
                <td style="font-size: 12px;"><textarea id="tempat" name="tempat" rows="3"></textarea></td>

            </tr>
        </table>

        <br>

        <table width="610">
            <tr>
                <td class="pembukaan" style="font-size: 12px;">Dengan ini saya selaku tuan rumah / panitia bersedia membuat pernyataan sebagai berikut :</td>
            </tr>
        </table>

        <table width="550">
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">1.<input type="text" id="apa" name="apa"> </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">2. Sanggup dan bersedia menjamin keamanan selama hajatan/hiburan berlangsung;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">3. Sanggup dan bersedia mentaati dan mematuhi tertera dalam surat izin keramaian;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">4. Sanggup dan bersedia menciptakan situasi kamtibnas yang kondusif;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">5. Sanggup melaksanakan keramaian sesuai dengan waktu yang telah ditentukan dan apabila melanggar maka kami siap dan bersedia untuk dibubarkan oleh pihak Kepolisian;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 12px;" align="left">6. Sanggup dan bersedia menjamin tidak ada Narkoba dan PERJUDIAN serta MINUMAN KERAS selama hajatan / hiburan berlangsung;</td>
    </tr>
    <tr>    
        <td colspan="2" style="font-size: 12px;" align="left">7. Apabila terjadi pelanggaran ataupun menyalahi peraturan yang ditentukan oleh pihak berwajib maka pihak yang bersangkutan sanggup dan bersedia ditindak sesuai hukum yang berlaku dan surat izin akan dicabut kembali tanpa ganti rugi;</td>
    </tr>
</table>



        <br>

        <table width="610">
            <tr>
                <td>
                    <font size="2">Demikian surat pernyataan ini saya buat dengan sebenarnya dalam keadaan sehat jasmani dan rohani dan tanpa paksaan dari pihak manapun.</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td align="right" class="surat" style="padding-right: 110px;">
                    <span style="font-size: 12px;">Kesumadadi, &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/20.. </span> <br>
                    <span style="font-size: 12px;">Yang membuat pernyataan</span>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table width="300">
            <tr>
                <td align="right" style="padding-right: px;">
                    <font size="2"><b style="text-decoration: underline;"><!--Diisi dengan nama penanda tangan--></b></font>
                </td>
            </tr>
        </table>
        <br>
        <table width="610">
            <tr>
                <td align="center" class="surat" style="padding-right: px;">
                    <span style="font-size: 12px;">Mengetahui, </span> <br>
                    <span style="font-size: 12px;">Kepala kampung Kesumadadi</span>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>