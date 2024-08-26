<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
	
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
            <h1><a href="dashboard.php">MEDICINE PHARMACY</a></h1>
            <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-image.php">Data Obat</a></li>
            <li><a href="Keluar.php">Logout</a></li>
            </ul>
            </div>
        </header>
        
        <!-- content -->
        <!-- Bagian konten utama -->
        <div class="section">
            <div class="container">
                <!-- Judul bagian profil -->
                <h3>Profil</h3>
                <div class="box">
                    <!-- Formulir untuk mengubah informasi profil -->
                    <form action="" method="POST">
                        <!-- Input untuk mengubah nama lengkap -->
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                        <!-- Input untuk mengubah username -->
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                        <!-- Input untuk mengubah nomor telepon -->
                        <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
                        <!-- Input untuk mengubah email -->
                        <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
                        <!-- Input untuk mengubah alamat -->
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
                        <!-- Tombol untuk mengirim perubahan profil -->
                        <input type="submit" name="submit" value="Ubah Profil" class="btn">
                    </form>
                    <?php
                        // Memeriksa apakah tombol submit untuk mengubah profil telah ditekan
                        if(isset($_POST['submit'])){
                            
                            // Mengambil data yang diinputkan pengguna dari formulir
                            $nama   = $_POST['nama'];
                            $user   = $_POST['user'];
                            $hp     = $_POST['hp'];
                            $email  = $_POST['email'];
                            $alamat = $_POST['alamat'];
                            
                            // Mengupdate data pengguna di database
                            $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                            admin_name = '".$nama."',   // Mengupdate nama
                                            username = '".$user."',     // Mengupdate username
                                            admin_telp = '".$hp."',     // Mengupdate nomor telepon
                                            admin_email = '".$email."', // Mengupdate email
                                            admin_address = '".$alamat."' // Mengupdate alamat
                                            WHERE admin_id = '".$d->admin_id."'"); // Berdasarkan ID pengguna

                            // Mengecek apakah update berhasil
                            if($update){
                                // Jika berhasil, tampilkan pesan sukses dan kembali ke halaman profil
                                echo '<script>alert("Ubah data berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            } else {
                                // Jika gagal, tampilkan pesan error
                                echo 'gagal '.mysqli_error($conn);
                            }
                        }  
                    ?>
                </div>
                
                <!-- Judul bagian ubah password -->
                <h3>Ubah password</h3>
                <div class="box">
                    <!-- Formulir untuk mengubah password -->
                    <form action="" method="POST">
                        <!-- Input untuk memasukkan password baru -->
                        <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                        <!-- Input untuk mengonfirmasi password baru -->
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                        <!-- Tombol untuk mengirim perubahan password -->
                        <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                    </form>
                    <?php
                        // Memeriksa apakah tombol submit untuk mengubah password telah ditekan
                        if(isset($_POST['ubah_password'])){
                            
                            // Mengambil data password baru yang diinputkan oleh pengguna
                            $pass1   = $_POST['pass1']; // Password baru
                            $pass2   = $_POST['pass2']; // Konfirmasi password baru
                            
                            // Memeriksa apakah password baru dan konfirmasinya sama
                            if($pass2 != $pass1){
                                // Jika tidak sama, tampilkan pesan peringatan
                                echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                            } else {
                                // Jika sama, update password di database
                                $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                                            password = '".$pass1."' // Mengupdate password
                                            WHERE admin_id = '".$d->admin_id."'"); // Berdasarkan ID pengguna

                                // Mengecek apakah update berhasil
                                if($u_pass){
                                    // Jika berhasil, tampilkan pesan sukses dan kembali ke halaman profil
                                    echo '<script>alert("Ubah data berhasil")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                } else {
                                    // Jika gagal, tampilkan pesan error
                                    echo 'gagal '.mysqli_error($conn);
                                }
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