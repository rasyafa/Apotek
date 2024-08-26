<?php
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
       <div class="header">
                <a href="css/style.css">
                <img src="img/logo.jpg" alt="logo">
                </a>
        <h1><a href="index.php">MEDICINE PHARMACY</a></h1>
        <ul>
            <li><a href="galeri.php">Katalog</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Obat" />
                <input type="submit" name="cari" value="Cari Obat" />
            </form>
        </div>
    </div>
    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Katalog</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/icon.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Katalog tidak ada</p>
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