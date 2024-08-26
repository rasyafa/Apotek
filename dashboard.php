<?php
     // Memulai sesi di PHP agar bisa mengakses data sesi yang telah disimpan sebelumnya
    session_start();

    // Memeriksa apakah pengguna sudah login atau belum
    // Jika pengguna belum login (status_login tidak sama dengan true), pengguna akan diarahkan ke halaman login
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Mengatur karakter encoding halaman agar mendukung karakter UTF-8 -->
<meta charset="utf-8">
<!-- Mengatur agar halaman dapat menyesuaikan tampilannya di berbagai perangkat, seperti ponsel -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Menentukan judul yang akan ditampilkan di tab browser -->
<title>Apotek</title>
<!-- Menghubungkan halaman ini dengan file CSS eksternal untuk mengatur tampilan (style) halaman -->
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <!-- Judul besar halaman yang berfungsi juga sebagai tautan ke dashboard -->
        <h1><a href="dashboard.php">MEDICINE PHARMACY</a></h1>
         <!-- Daftar menu navigasi untuk berpindah ke halaman lain dalam website -->
        <ul>
           <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profil</a></li>
           <li><a href="data-image.php">Data Obat</a></li>
           <li><a href="Keluar.php">Logout</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <!-- Judul untuk bagian utama konten -->
            <h3>Dashboard</h3>
            <!-- Kotak berisi sambutan untuk pengguna yang sudah login -->
            <div class="box">
                <!-- Menampilkan pesan selamat datang kepada pengguna, dengan menggunakan nama pengguna yang tersimpan dalam sesi -->
                <h4>Welcome <?php echo $_SESSION['a_global']->admin_name ?> Di Website Medicine Pharmacy</h4>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <!-- Catatan hak cipta di bagian bawah halaman -->
            <small>Copyright &copy; 2024 - Medicine Pharmacy</small>
        </div>
    </footer>
</body>
</html>