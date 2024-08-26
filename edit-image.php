<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	
	$produk = mysqli_query($conn, "SELECT * FROM  tb_image WHERE image_id = '".$_GET['id']."'");
	if(mysqli_num_rows($produk) == 0){
	    echo '<script>window.location="data-image.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apotek</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
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
		<div class="section">
			<div class="container">
				<!-- Judul halaman -->
				<h3>Edit Data Obat</h3>
				<div class="box">
					<!-- Formulir untuk mengedit data obat -->
					<form action="" method="POST" enctype="multipart/form-data">
						<!-- Input untuk katalog obat, hanya bisa dibaca (readonly) -->
						<input type="text" name="kategori" class="input-control" placeholder="Katalog Obat" value="<?php echo $p->category_name ?>" readonly="readonly">
						
						<!-- Input untuk nama pengguna, hanya bisa dibaca (readonly) -->
						<input type="text" name="namauser" class="input-control" placeholder="Nama User" value="<?php echo $p->admin_name ?>" readonly="readonly">
						
						<!-- Input untuk nama obat, harus diisi -->
						<input type="text" name="nama" class="input-control" placeholder="Nama Obat" value="<?php echo $p->image_name ?>" required>
						
						<!-- Menampilkan gambar obat saat ini -->
						<img src="foto/<?php echo $p->image ?>" width="100px" />
						
						<!-- Input tersembunyi untuk menyimpan nama gambar saat ini -->
						<input type="hidden" name="foto" value="<?php echo $p->image ?>" />
						
						<!-- Input untuk mengganti gambar obat -->
						<input type="file" name="gambar" class="input-control">
						
						<!-- Input untuk deskripsi obat -->
						<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->image_description ?></textarea><br />
						
						<!-- Pilihan status obat (Aktif atau Tidak Aktif) -->
						<select class="input-control" name="status">
							<option value="">--Pilih--</option>
							<option value="1" <?php echo ($p->image_status == 1)? 'selected':''; ?>>Aktif</option>
							<option value="0" <?php echo ($p->image_status == 0)? 'selected':''; ?>>Tidak Aktif</option> 
						</select>
						
						<!-- Tombol untuk mengirimkan formulir -->
						<input type="submit" name="submit" value="Submit" class="btn">
					</form>

					<?php
						// Cek jika formulir sudah disubmit
						if(isset($_POST['submit'])){
							
							// Ambil data dari formulir
							$kategori  = $_POST['kategori'];
							$user      = $_POST['namauser'];
							$nama      = $_POST['nama'];
							$deskripsi = $_POST['deskripsi'];
							$status    = $_POST['status'];
							$foto      = $_POST['foto'];
							
							// Ambil data gambar yang diupload
							$filename = $_FILES['gambar']['name'];
							$tmp_name = $_FILES['gambar']['tmp_name'];
							
							// Jika admin mengganti gambar
							if($filename != ''){
								
								// Mendapatkan ekstensi file gambar
								$type1 = explode('.', $filename);
								$type2 = $type1[1];
								
								// Membuat nama file baru untuk gambar
								$newname = 'foto'.time().'.'.$type2;
								
								// Format file yang diizinkan
								$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
								
								// Validasi format file
								if(!in_array($type2, $tipe_diizinkan)){
									// Jika format file tidak diizinkan
									echo '<script>alert("Format file tidak diizinkan")</script>';
								} else {
									// Menghapus gambar lama dan menyimpan gambar baru
									unlink('./foto/'.$foto); 
									move_uploaded_file($tmp_name, './foto/'.$newname);
									$namagambar = $newname;  
								}
							} else {
								// Jika tidak mengganti gambar, gunakan gambar lama
								$namagambar = $foto;
							}
							
							// Query untuk memperbarui data obat di database
							$update = mysqli_query($conn, "UPDATE tb_image SET
											category_name       = '".$kategori."',
											admin_name          = '".$user."',
											image_name          = '".$nama."',
											image_description   = '".$deskripsi."',
											image               = '".$namagambar."',
											image_status        = '".$status."'
											WHERE image_id      = '".$p->image_id."' ");
							
							// Cek jika update berhasil
							if($update){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="data-image.php"</script>';
							} else {
								// Jika gagal, tampilkan pesan kesalahan
								echo 'gagal '.mysqli_error($conn);
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
		<script>
				CKEDITOR.replace( 'deskripsi' );
		</script>
	</body>
</html>