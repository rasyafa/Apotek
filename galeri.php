<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
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
        
        <!-- search -->
        <!-- Bagian untuk mencari obat -->
        <div class="search">
            <div class="container">
                <!-- Formulir pencarian -->
                <form action="galeri.php">
                    <!-- Input untuk mencari obat berdasarkan nama -->
                    <input type="text" name="search" placeholder="Cari Obat" value="<?php echo $_GET['search'] ?>" />
                    
                    <!-- Input tersembunyi untuk menyimpan kategori yang sedang dipilih -->
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                    
                    <!-- Tombol untuk mengirimkan formulir pencarian -->
                    <input type="submit" name="cari" value="Cari Obat" />
                </form>
            </div>
        </div>

        <!-- new product -->
        <!-- Bagian untuk menampilkan katalog obat -->
        <div class="section">
            <div class="container">
            <h3>Katalog Obat</h3>
            <div class="box">
                <?php
                    // Cek apakah ada kata kunci pencarian atau kategori
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        // Menciptakan filter pencarian berdasarkan nama obat dan kategori
                        $where = "AND image_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    // Query untuk mengambil data obat yang statusnya aktif dan sesuai filter
                    $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
                    
                    // Cek jika ada hasil dari query
                    if(mysqli_num_rows($foto) > 0){
                        // Loop melalui hasil query
                        while($p = mysqli_fetch_array($foto)){
                ?>
                <!-- Link ke detail obat -->
                <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                    <div class="col-4">
                        <!-- Menampilkan gambar obat -->
                        <img src="foto/<?php echo $p['image'] ?>" height="150px" />
                        <!-- Menampilkan nama obat (dibatasi 30 karakter) -->
                        <p class="nama"><?php echo substr($p['image_name'], 0, 30) ?></p>
                        <!-- Menampilkan nama pengguna yang mengupload obat -->
                        <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
                        <!-- Menampilkan tanggal upload obat -->
                        <p class="nama"><?php echo $p['date_created']  ?></p>
                    </div>
                </a>
                <?php }} else { ?>
                    <!-- Pesan jika tidak ada foto yang ditemukan -->
                    <p>Foto tidak ada</p>
                <?php } ?>
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