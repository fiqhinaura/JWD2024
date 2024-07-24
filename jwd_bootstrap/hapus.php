<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang dikirim dari form
$id_pasien = $_POST['id_pasien'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM pasien WHERE id_pasien='$id_pasien'");

// mengalihkan halaman kembali ke pasien.php
header("Location: pasien.php");
?>
