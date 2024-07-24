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

if (isset($_FILES['ktp']) && $_FILES['ktp']['error'] == 0) {
    $file = $_FILES['ktp'];
    $fileTmpName = $file['tmp_name'];
    $fileContent = file_get_contents($fileTmpName);
    $ktp = mysqli_real_escape_string($koneksi, $fileContent);
} else {
    $ktp = null; // Keep the existing value if no new file is uploaded
}

$query = "UPDATE pasien SET
    nama_pasien='$nama_pasien',
    tanggal_lahir_pasien='$tanggal_lahir_pasien',
    jenis_kelamin='$jenis_kelamin',
    nohp_pasien='$nohp_pasien',
    goldar_pasien='$goldar_pasien',
    alamat_pasien='$alamat_pasien',
    ktp='" . ($ktp ? $ktp : 'NULL') . "',
    jenis='$jenis',
    lama_perawatan='$lama_perawatan',
    total_tagihan='$total_tagihan'
    WHERE id_pasien='$id_pasien'";

if (mysqli_query($koneksi, $query)) {
    header("Location: pasien.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
