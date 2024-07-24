<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_pasien = $_GET['id_pasien'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pasien where id_pasien='$id_pasien'");
 
// mengalihkan halaman kembali ke index.php
header("location:pasien.php");
 
?>