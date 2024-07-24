<?php
include 'koneksi.php';

$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$tanggal_lahir_pasien = $_POST['tanggal_lahir_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nohp_pasien = $_POST['nohp_pasien'];
$goldar_pasien = $_POST['goldar_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$jenis = $_POST['jenis'];
$lama_perawatan = $_POST['lama_perawatan'];
$total_tagihan = $_POST['total_tagihan'];

if (isset($_FILES['ktp'])) {
    $file = $_FILES['ktp'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileContent = file_get_contents($fileTmpName);
    $ktp = mysqli_real_escape_string($koneksi, $fileContent);
} else {
    $ktp = null;
}

$query = "INSERT INTO pasien (id_pasien, nama_pasien, tanggal_lahir_pasien, jenis_kelamin, nohp_pasien, goldar_pasien, alamat_pasien, ktp, jenis, lama_perawatan, total_tagihan)
          VALUES ('$id_pasien', '$nama_pasien', '$tanggal_lahir_pasien', '$jenis_kelamin', '$nohp_pasien', '$goldar_pasien', '$alamat_pasien', '$ktp', '$jenis', '$lama_perawatan', '$total_tagihan')";

if (mysqli_query($koneksi, $query)) {
    header("Location: pasien.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
