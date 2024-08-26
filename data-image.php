<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
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
    <div class="section">
        <div class="container">
            <!-- Judul untuk bagian Data Obat -->
            <h3>Data Obat</h3>
            <div class="box">
                <!-- Tautan untuk menambah data obat baru -->
                <p><a href="tambah-image.php">Tambah Data</a></p>
                <!-- Tabel yang digunakan untuk menampilkan data obat -->
                <table border="1" cellspacing="0" class="table">
                    <!-- Bagian kepala tabel, tempat judul kolom ditulis -->
                    <thead>
                        <tr>
                            <th width="60px">No</th> <!-- Kolom untuk nomor urut -->
                            <th>Katalog</th> <!-- Kolom untuk kategori obat -->
                            <th>Nama User</th> <!-- Kolom untuk nama pengguna yang menambahkan data -->
                            <th>Nama Obat</th> <!-- Kolom untuk nama obat -->
                            <th>Deskripsi</th> <!-- Kolom untuk deskripsi obat -->
                            <th>Gambar</th> <!-- Kolom untuk menampilkan gambar obat -->
                            <th>Status</th> <!-- Kolom untuk status (Aktif/Tidak Aktif) -->
                            <th width="150px">Aksi</th> <!-- Kolom untuk tindakan seperti Edit dan Hapus -->
                        </tr>
                    </thead>
                    <!-- Bagian tubuh tabel, tempat data sebenarnya akan ditampilkan -->
                    <tbody>
                        <?php
                            // Memulai nomor urut dari 1
						    $no = 1;
                            // Mengambil ID pengguna yang sedang login dari sesi
							$user = $_SESSION['a_global']->admin_id;
                            // Menjalankan query untuk mengambil data obat yang dimasukkan oleh pengguna yang sedang login
                            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
                            // Memeriksa apakah ada data yang ditemukan
							if(mysqli_num_rows($foto) >0 ){
                            // Looping untuk menampilkan setiap baris data yang ditemukan
							while($row = mysqli_fetch_array($foto)){
						?>
                        <tr>
                           <!-- Menampilkan nomor urut -->
                            <td><?php echo $no++ ?></td>
                       
                            <!-- Menampilkan nama kategori obat -->
                            <td><?php echo $row['category_name'] ?></td>
                       
                            <!-- Menampilkan nama pengguna yang menambahkan data -->
                            <td><?php echo $row['admin_name'] ?></td>
                       
                            <!-- Menampilkan nama obat -->
                            <td><?php echo $row['image_name'] ?></td>
                       
                            <!-- Menampilkan deskripsi obat -->
                            <td><?php echo $row['image_description']?></td>
                       
                            <!-- Menampilkan gambar obat, dengan tautan ke gambar dalam ukuran penuh -->
                            <td><a href="foto/<?php echo $row['image']?>" target="_blank"><img src="foto/<?php echo $row['image']?>" width="50px"></a></td>
                       
                            <!-- Menampilkan status obat, apakah 'Aktif' atau 'Tidak Aktif' -->
                            <td><?php echo ($row['image_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                       
                            <!-- Menampilkan tautan untuk mengedit atau menghapus data -->
                            <td>
                            <!-- Tautan untuk mengedit data obat -->
                            <a href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a> || 
                          
                            <!-- Tautan untuk menghapus data obat, dengan konfirmasi sebelum penghapusan -->
                            <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            }
					    }else{
					    ?>
                             <!-- Jika tidak ada data, tampilkan pesan 'Tidak ada data' -->
                             <tr>
                                <td colspan="8">Tidak ada data</td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
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