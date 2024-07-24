<?php
//koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form
$id_pasien = $_POST ['id_pasien'];
$nama_pasien = $_POST ['nama_pasien'];
$tanggal_lahir_pasien = $_POST ['tanggal_lahir_pasien'];
$jenis_kelamin = $_POST ['jenis_kelamin'];
$nohp_pasien = $_POST ['nohp_pasien'];
$goldar_pasien = $_POST ['goldar_pasien'];
$alamat_pasien = $_POST ['alamat_pasien'];



//menginput data ke database
mysqli_query($koneksi,"insert into pasien values('$id_pasien','$nama_pasien','$tanggal_lahir_pasien','$jenis_kelamin','$nohp_pasien','$goldar_pasien','$alamat_pasien')");

// //mengalihkan halaman kembali ke index.php
header("location:pasien.php");
?>