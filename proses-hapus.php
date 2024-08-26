<?php

   // Menyertakan (menghubungkan) file 'db.php' untuk koneksi ke database
   include 'db.php';
      
   // Memeriksa apakah ada data 'idp' yang dikirim melalui URL (menggunakan metode GET)
   if(isset($_GET['idp'])){
	   
	   // Mengambil data gambar dari database berdasarkan 'idp' (ID dari gambar yang akan dihapus)
	   $foto = mysqli_query($conn, "SELECT image FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	   
	   // Menyimpan hasil query dalam objek untuk mengambil nama file gambar
	   $p = mysqli_fetch_object($foto);
	   
	   // Menghapus file gambar dari folder 'foto' di server
	   unlink('./foto/'.$p->image);
	   
	   // Menghapus data gambar dari tabel 'tb_image' di database berdasarkan 'idp'
	   $delete = mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	   
	   // Mengarahkan pengguna kembali ke halaman 'data-image.php' setelah penghapusan
	   echo '<script>window.location="data-image.php"</script>';
   }

?>
