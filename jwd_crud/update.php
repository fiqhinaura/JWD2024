<?php
// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$tanggal_lahir_pasien = $_POST['tanggal_lahir_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nohp_pasien = $_POST['nohp_pasien'];
$goldar_pasien = $_POST['goldar_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];

// Update data ke database
mysqli_query($koneksi, "UPDATE pasien SET 
    nama_pasien='$nama_pasien',
    tanggal_lahir_pasien='$tanggal_lahir_pasien',
    jenis_kelamin='$jenis_kelamin',
    nohp_pasien='$nohp_pasien',
    goldar_pasien='$goldar_pasien',
    alamat_pasien='$alamat_pasien'
    WHERE id_pasien='$id_pasien'");

// Mengalihkan halaman kembali ke pasien.php
header("location:pasien.php");
?>
