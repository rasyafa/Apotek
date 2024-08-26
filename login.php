<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login | Apotek</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body id="bg-login">
		<!-- Bagian untuk menampilkan form login -->
		<div class="box-login">
			<h2>Login</h2>
			<!-- Formulir untuk pengguna memasukkan username dan password -->
			<form action="" method="POST">
				<!-- Input untuk username -->
				<input type="text" name="user" placeholder="Username" class="input-control">
				<!-- Input untuk password -->
				<input type="password" name="pass" placeholder="Password" class="input-control">
				<!-- Tombol untuk mengirimkan data login -->
				<input type="submit" name="submit" value="Login" class="btn">
			</form>

			<?php
			// Mengecek apakah tombol submit telah ditekan
			if (isset($_POST['submit'])) {
				// Memulai sesi untuk melacak data pengguna setelah login
				session_start();
				// Menghubungkan ke database
				include 'db.php';

				// Mengambil input dari form dan melindungi dari serangan SQL Injection
				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				// Memeriksa apakah username dan password cocok dengan data di database
				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "' AND password = '" . $pass . "'");
				if (mysqli_num_rows($cek) > 0) {
					// Jika cocok, ambil data pengguna dan simpan dalam sesi
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true; // Menandai bahwa pengguna telah login
					$_SESSION['a_global'] = $d; // Menyimpan data pengguna secara global
					$_SESSION['id'] = $d->admin_id; // Menyimpan ID pengguna untuk referensi
					// Arahkan pengguna ke halaman dashboard setelah login berhasil
					echo '<script>window.location="dashboard.php"</script>';
				} else {
					// Jika username atau password salah, tampilkan pesan peringatan
					echo '<script>alert("Username atau password anda salah")</script>';
				}
			}
			?>
			<br />
			<!-- Tautan untuk pengguna yang belum memiliki akun, mengarahkan ke halaman registrasi -->
			<p>Belum punya akun? daftar <a style="color:#00C;" href="registrasi.php">HERE</a></p>
			<!-- Tautan untuk kembali ke halaman utama -->
			<p>atau klik <a style="color:#00C;" href="index.php">Back</a></p>
		</div>
	</body>


</html>