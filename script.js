// script.js
function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Contoh sederhana validasi, seharusnya diimplementasikan di server
    if (username === "Nursalim" && password === "123456789") {
        window.location.href = "cari.html"; // Ganti dengan halaman utama yang sesuai
    } else {
        alert("Login gagal. Coba lagi.");
    }
}

function succes(){
    var Nik = document.getElementById("Nik").value;
    var Nama = document.getElementById("Nama").value;
    var Tempat = document.getElementById("Tempat").value;
    var Tgl = document.getElementById("Tanggal_Lahir").value;
    var Alamat = document.getElementById("Alamat").value;
    var Agama = document.getElementById("Agama").value;
    var Status = document.getElementById("Status").value;
    var Pekerjaan = document.getElementById("Pekerjaan").value;
    var Kewarganegaraan = document.getElementById("Kewarganegaraan").value;
    if (Nik === "" || Nama === "" || Tempat === "" || Tgl === "" || Alamat === "" || Agama === "" || Status === "" || Pekerjaan === "" || Kewarganegaraan === "") {
        alert("Harap lengkapi semua data sebelum menyimpan.");
    } else {
        // Semua data telah terisi, maka tampilkan pesan sukses
        alert("Data tersimpan");
    }
}
