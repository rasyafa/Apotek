<?php
	include 'db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apotek</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">MEDICINE PHARMACY</a></h1>
        <ul>
           <li><a href="galeri.php">Katalog</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <!-- Bagian untuk konten utama halaman -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
                <!-- Formulir untuk registrasi akun baru -->
                <form action="" method="POST">
                    <!-- Input untuk nama pengguna -->
                    <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                    <!-- Input untuk username -->
                    <input type="text" name="user" placeholder="Username" class="input-control" required>
                    <!-- Input untuk password -->
                    <input type="text" name="pass" placeholder="Password" class="input-control" required>
                    <!-- Input untuk nomor telepon -->
                    <input type="text" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                    <!-- Input untuk email -->
                    <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                    <!-- Input untuk alamat -->
                    <input type="text" name="almt" placeholder="Alamat" class="input-control" required>
                    <!-- Tombol submit untuk mengirimkan data registrasi -->
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    // Memeriksa apakah tombol submit telah ditekan
                    if(isset($_POST['submit'])){
                        
                        // Mengambil data yang diinputkan oleh pengguna dan menyimpannya dalam variabel
                        $nama = ucwords($_POST['nama']);        // Nama pengguna, diubah menjadi format huruf besar pada setiap kata
                        $username = $_POST['user'];             // Username yang diinputkan
                        $password = $_POST['pass'];             // Password yang diinputkan
                        $telpon = $_POST['tlp'];                // Nomor telepon yang diinputkan
                        $mail = $_POST['email'];                // Email yang diinputkan
                        $alamat = ucwords($_POST['almt']);      // Alamat, diubah menjadi format huruf besar pada setiap kata
                        
                        // Menyimpan data pengguna baru ke dalam database
                        $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                                            null,              // ID admin, diisi otomatis oleh database
                                            '".$nama."',       // Nama pengguna
                                            '".$username."',   // Username
                                            '".$password."',   // Password
                                            '".$telpon."',     // Nomor telepon
                                            '".$mail."',       // Email
                                            '".$alamat."'      // Alamat
                                        )");
                        
                        // Memeriksa apakah data berhasil disimpan ke database
                        if($insert){
                            // Jika berhasil, tampilkan pesan sukses dan arahkan pengguna ke halaman login
                            echo '<script>alert("Registrasi berhasil")</script>';
                            echo '<script>window.location="login.php"</script>';
                        } else {
                            // Jika gagal, tampilkan pesan error dengan alasan kegagalannya
                            echo 'Gagal melakukan registrasi: '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Medicine Pharmacy.</small>
        </div>
    </footer>
    </body>
</html>