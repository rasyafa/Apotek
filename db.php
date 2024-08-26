<?php
    // Menetapkan informasi koneksi ke database
    $hostname = 'localhost';   // Nama host tempat database berada (sering kali 'localhost' jika berada di komputer yang sama)
    $username = 'root';        // Nama pengguna untuk masuk ke database
    $password = '';            // Kata sandi untuk nama pengguna (kosong jika tidak ada kata sandi)
    $dbname   = 'galerifoto';  // Nama database yang ingin diakses

    // Membuat koneksi ke database
    $conn = mysqli_connect($hostname, $username, $password, $dbname) 
        // Jika gagal terhubung, tampilkan pesan kesalahan
        or die ('gagal terhubung ke database');
?>
